<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//AuthControler
Route::match (
    ['get', 'post'],
    '/login',
    [AuthController::class, 'loginUser']
)->name('login');
Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout');

//UserController
Route::match (
    ['get', 'post'],
    '/register',
    [UserController::class, 'registerUser']
)->name('register');

//Controlar o usuario
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('ListAllUsers');
    Route::get('/users/{uid}', [UserController::class, 'listUser'])->name('ListUser');
    //Route::get('/users/{uid}/edit', [UserController::class, 'editUser'])->name('routeEditUser');
    //Route::get('/users/{uid}/delete', [UserController::class, 'deleteUser'])->name('routeDeleteUser');
    Route::put('/users/{uid}/edit',
    [UserController::class, 'updateUser'])->name('UpdateUser');
    
    Route::delete('/users/{uid}/delete',
    [UserController::class, 'deleteUser'])->name('DeleteUser');
});


//Category
//Visualização sem auth
Route::get('/category', [CategoryController::class, 'listAllCategory'])->name('ListAllCategory');
Route::get('/category/{cid}', [CategoryController::class, 'showCategory'])->name('showCategory');

//Controlar a categoria
Route::middleware('auth')->group(function () {

    Route::match (
        ['get', 'post'],
        '/createcat',
        [CategoryController::class, 'createCategory']
    )->name('CreateCategory');
    
    Route::put('/category/{cid}/edit',
    [CategoryController::class, 'updateCategory'])->name('UpdateCategory');

    Route::delete('/category/{cid}/delete',
    [CategoryController::class, 'deleteCategory'])->name('DeleteCategory');
});

//Tag
Route::get('/tag', [TagController::class, 'listAllTags'])->name('ListAllTags');
Route::get('/tag/{tid}', [TagController::class, 'showTag'])->name('showTag');

//Controlar a tag
Route::middleware('auth')->group(function () {

    Route::match (
        ['get', 'post'],
        '/createtag',
        [TagController::class, 'createTag']
    )->name('CreateTag');
    
    Route::put('/tag/{tid}/edit',
    [TagController::class, 'updateTag'])->name('UpdateTag');

    Route::delete('/tag/{tid}/delete',
    [TagController::class, 'deleteTag'])->name('DeleteTag');
});


//Topic
Route::get('/topic', [TopicController::class, 'listAllTopics'])->name('ListAllTopics');
Route::get('/topic/{tcid}', [TopicController::class, 'showTopic'])->name('showTopic');

//Controlar o topic
Route::middleware('auth')->group(function () {

    Route::get('/createtopic', [TopicController::class, 'createTopic'])->name('CreateTopic');
    Route::post('/createtopic', [TopicController::class, 'storeTopic'])->name('CreateTopic');

    Route::get('/topic/{tid}/edit', [TopicController::class, 'editTopic'])->name('EditTopic');
    
    Route::put('/topic/{tcid}/edit',
    [TopicController::class, 'updateTopic'])->name('UpdateTopic');

    Route::get('/topic/{tcid}/delete', [TopicController::class, 'deleteTopic'])->name('DeleteTopic');
    Route::delete('/topic/{tcid}/delete',
    [TopicController::class, 'deleteTopic'])->name('DeleteTopic');
});


// Rotas de Comentários
Route::middleware('auth')->group(function () {
Route::post('/topics/{tcid}/comments', [CommentController::class, 'store'])->name('storeComment');
Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('editComment');
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('updateComment');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('deleteComment');
});
