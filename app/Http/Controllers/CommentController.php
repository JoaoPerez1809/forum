<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $topicId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagePath = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('comments', 'public');
        }
        $comment = Comment::create([
            'topic_id' => $topicId,
            'content' => $request->content,
        ]);
        $comment->post()->create([
            'user_id' => Auth::id(),
            'image' => $imagePath,
        ]);

        return redirect()->route('showTopic', [$topicId])
            ->with('message', 'Comentário adicionado com sucesso!');
    }

    public function destroy($id)
    {
        $comment = Comment::with('post')->findOrFail($id);

        if (Auth::id() !== $comment->post->user_id) {
            abort(403, 'Acesso negado.');
        }

        $comment->post->delete();
        $comment->delete();

        return redirect()->route('showTopic', [$comment->topic_id])
            ->with('message', 'Comentário excluído com sucesso!');
    }
}
