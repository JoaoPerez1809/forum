@push('styles')
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
<link rel="stylesheet" href="{{ asset('css/topic.css') }}">
@endpush

@extends('layouts.layout')

@section('title', 'Página Inicial')

@section('content')

<div class="container">
    <div class="blog-post">
        <h2 class="post-title">{{ $topic->title }}</h2>
        <p><strong>Criado por:</strong> {{ $topic->post->user->name ?? 'Usuário não encontrado' }}</p>
        <p><strong>Status:</strong> {{ $topic->status == 0 ? 'Fechado' : 'Aberto' }}</p>
        <p class="post-text"><strong>Descrição:</strong> {{ $topic->description }}</p>
        <p><strong>Categoria:</strong> {{ $topic->category->title ?? 'Categoria não encontrada' }}</p>
        <p><strong>Tags:</strong> 
            @if($topic->tags && $topic->tags->isNotEmpty())
                {{ $topic->tags->pluck('title')->join(', ', ' e ') }}.
            @else
                <span>Nenhuma tag</span>
            @endif
        </p>
        @if(isset($topic->post->image) && !empty($topic->post->image))
            <img class="post-image" src="{{ asset('storage/' . $topic->post->image) }}" alt="Imagem do Tópico">
        @else
            <p>Imagem não disponível</p>
        @endif

        @if($topic->post->user_id == Auth::id())
            <form action="{{ route('DeleteTopic', [$topic->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-submit-comment" onclick="return confirm('Tem certeza que deseja deletar este tópico?');">Deletar</button>
            </form>
        @endif
    </div>

    <div class="comments-section">
        <h3>Adicionar Comentário</h3>
        <form class="comment-form" action="{{ route('storeComment', $topic->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <textarea name="content" placeholder="Escreva seu comentário..." required></textarea><br>
            <label for="image">Imagem (opcional):</label><br>
            <input type="file" name="image" accept="image/*"><br><br>
            <button type="submit" class="btn-submit-comment">Adicionar Comentário</button>
        </form>
        <hr>

        <h3>Comentários</h3>
        @foreach($topic->comments as $comment)
            <div class="comment">
                <p><strong>{{ $comment->post->user->name ?? 'Usuário não encontrado' }} comentou:</strong></p>
                <p>{{ $comment->content }}</p>
                @if($comment->post->image)
                    <img src="{{ asset('storage/' . $comment->post->image) }}" alt="Imagem do Comentário" class="comment-image">
                @else
                    <!--p>Imagem não disponível</p-->
                @endif
                @if($comment->post->user_id == Auth::id())
                    <form action="{{ route('deleteComment', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-submit-comment" onclick="return confirm('Tem certeza que deseja excluir este comentário?');">Excluir</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div>

@endsection
