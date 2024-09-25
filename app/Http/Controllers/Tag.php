<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Tag extends Controller
{
    //listAllUsers ou list_all_users
    public function listAllTag(Request $request) {
        // Lógica
        return view('cateogory.listAllTag');
    }

    public function listTag(Request $request, $uid) {
        $tag = Tag::where('id', $uid)->first();
        $message;
        return view('Tag.id.listTagById', ['tag' => $tag]);
    }

    public function updateTag(Request $request, $uid) {
        $tag = Tag::where('id', $uid)->first();
        $tag->title = $request->title;
        
        $tag->save();

        return redirect()->route('ListTag', [$tag->id])
        ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteTag(Request $request, $uid) {
        $tag = Tag::where('id', $uid)->delete();
        return redirect()->intended('/')
        ->with('message', 'Deletado com sucesso!');
    }

    public function registerTag(Request $request) {
        if ($request->method() === 'GET'){
        return view('tag.register.registerTag');
        } else {
            $request->validate([
                'title' => 'required|string|max:100',
                
            ]);

            $tag = Tag::create([
                'title' => $request->title,
                ]);

            Auth::login($tag);

            return redirect()->intended('/')->with('success', 'Tag registrada com sucesso');
        }
    }

    public function editTag() {
        return view('tag.id.edit.editTag');
    }


}
