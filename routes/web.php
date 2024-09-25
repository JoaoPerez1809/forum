<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

//Routes Estaticos
Route::get('/criar_topico', function () {
    return view('layouts.criar_topico');
});
Route::get('/visualizar_topico', function () {
    return view('layouts.visualizar_topico');
});


//Category
Route::match (
    ['get', 'post'],
    '/register',
    [UserController::class, 'registerUser']
)->name('register');

//Controlar a categoria
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

//Tag
Route::match (
    ['get', 'post'],
    '/register',
    [UserController::class, 'registerUser']
)->name('register');

//Controlar a tag
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


     