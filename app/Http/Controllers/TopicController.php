<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\facades\Auth;

class TopicController extends Controller
{
    public function listAllTopics(Request $request) {
        $topics = Topic::with(['post.user', 'category'])->get();
        return view('topic.listAllTopics', compact('topics')); 
    }

    public function showTopic(Request $request, $tid) {
        $topic = Topic::with(['post.user', 'category'])->findOrFail($tid);
        return view('topic.id.showTopic', compact('topic'));
    }

    public function updateTopic(Request $request, $tid)
{
    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'status' => 'required|int',
        'category' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $topic = Topic::findOrFail($tid);

    // Atualizar os campos
    $topic->title = $request->title;
    $topic->description = $request->description;
    $topic->status = $request->status;
    $topic->category_id = $request->category;

    // Verifica se uma nova imagem foi enviada
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Apagar a imagem antiga, se necessário
        if ($topic->post->image) {
            \Storage::disk('public')->delete($topic->post->image);
        }

        // Salvar a nova imagem
        $imagePath = $request->file('image')->store('topics', 'public');
        $topic->post->image = $imagePath;
        $topic->post->save();
    }

    $topic->save();

    return redirect()->route('showTopic', [$topic->id])
        ->with('message', 'Tópico atualizado com sucesso!');
}

    public function deleteTopic(Request $request, $tid) {
        $topic = Topic::where('id', $tid)->delete();
        return redirect()->intended('/topic')
        ->with('message', 'Deletado com sucesso!');
    }

    public function createTopic()
    {
        $categories = Category::all();
        return view('topic.createtopic.createTopic', ['categories' => $categories]);
    }

    public function storeTopic(Request $request) {
        $userId = Auth::id();
    

            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|int',
                'category' => 'required',
            ]);


            $imagePath = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $imagePath = $request->file('image')->store('topics', 'public');
            }
    
            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category
            ]);

            $topic->post()->create([
                'user_id' => Auth::id(),
                'image' => $imagePath,
            ]);

            return redirect()->intended('/topic')
        ->with('message', 'Criado com sucesso!');
    }
    

    public function editTopic($tid)
{
    $topic = Topic::with(['post.user', 'category'])->findOrFail($tid);
    $categories = Category::all(); // Busca todas as categorias
    return view('topic.id.edit.editTopic', compact('topic', 'categories'));
}
}
