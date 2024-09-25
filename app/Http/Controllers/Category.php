<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Category extends Controller
{
    //listAllUsers ou list_all_users
    public function listAllCategory(Request $request) {
        // Lógica
        return view('cateogry.listAllCategory');
    }

    public function listCategory(Request $request, $uid) {
        $category = Category::where('id', $uid)->first();
        $message;
        return view('Category.id.listCategoryById', ['category' => $category]);
    }

    public function updateCategory(Request $request, $uid) {
        $category = Category::where('id', $uid)->first();
        $category->title = $request->title;
        $category->description = $request->description;
        
        $category->save();

        return redirect()->route('ListCategory', [$category->id])
        ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteCategory(Request $request, $uid) {
        $category = Category::where('id', $uid)->delete();
        return redirect()->intended('/')
        ->with('message', 'Deletado com sucesso!');
    }

    public function registerCategory(Request $request) {
        if ($request->method() === 'GET'){
        return view('category.register.registerCategory');
        } else {
            $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string|max:255',
            ]);

            $category = Category::create([
                'title' => $request->title,
                'description' => $request->description,
                ]);

            Auth::login($category);

            return redirect()->intended('/')->with('success', 'Categoria registrada com sucesso');
        }
    }

    public function editCategory() {
        return view('category.id.edit.editCategory');
    }


}
