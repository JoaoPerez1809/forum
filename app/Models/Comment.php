<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Post
{
    use HasFactory;

    protected $fillable = [
        'content',
        'topic_id',
    ];

    // Relacionamento Polimórfico com Post
    public function post()
    {
        return $this->morphOne(Post::class, 'postable');
    }

    // Relacionamento com o tópico
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}