<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\facades\Auth;

class TopicController extends Controller
{
    public function listAllTopics(Request $request) {
        $topics = Topic::with(['post.user', 'category', 'tags'])->get();
        return view('topic.listAllTopics', compact('topics')); 
    }

    public function showTopic(Request $request, $tid) {
        $topic = Topic::with(['post.user', 'category', 'tags'])->findOrFail($tid);
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
        'tags' => 'array',
        'tags.*' => 'exists:tags,id',
    ]);

    $topic = Topic::findOrFail($tid);

    $topic->title = $request->title;
    $topic->description = $request->description;
    $topic->status = $request->status;
    $topic->category_id = $request->category;

    if ($request->hasFile('image') && $request->file('image')->isValid()) {

        if ($topic->post->image) {
            \Storage::disk('public')->delete($topic->post->image);
        }

        $imagePath = $request->file('image')->store('topics', 'public');
        $topic->post->image = $imagePath;
        $topic->post->save();
    }

    if ($request->tags) {
        $topic->tags()->sync($request->tags);
    }

    $topic->save();

    return redirect()->route('showTopic', [$topic->id])
        ->with('message', 'Tópico atualizado com sucesso!');
}

    public function deleteTopic(Request $request, $tid) {
        $topic = Topic::findOrFail($id);

        if ($topic->post) {
            \Storage::disk('public')->delete($topic->post->image);
            $topic->post->delete();
        }
        $topic->tags()->detach();
        $topic->delete();
        return redirect()->intended('/topic')
        ->with('message', 'Deletado com sucesso!');
    }

    public function createTopic()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('topic.createtopic.createTopic', ['categories' => $categories],['tags' => $tags]);
    }

    public function storeTopic(Request $request) {
        $userId = Auth::id();
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|int',
                'category' => 'required',
                'tags' => 'array',
                'tags.*' => 'exists:tags,id',
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

            if ($request->tags) {
                $topic->tags()->attach($request->tags);
            }

            return redirect()->intended('/topic')
        ->with('message', 'Criado com sucesso!');
    }
    

    public function editTopic($tid)
{
    $topic = Topic::with(['post.user', 'category', 'tags'])->findOrFail($tid);
    $categories = Category::all();
    $tags = Tag::all();
    return view('topic.id.edit.editTopic', compact('topic', 'categories', 'tags'));
}
}
