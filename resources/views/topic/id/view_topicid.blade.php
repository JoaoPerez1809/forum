<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title> <!-- O título será substituído pelo valor da seção 'title' -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f5ff; /* Azul claro para o fundo */
        }
        header {
            background-color: #007bff; /* Azul */
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav {
            background-color: #e7f0ff; /* Azul claro */
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            padding: 10px;
            border-bottom: 1px solid #ccdfff; /* Azul claro para a borda */
        }
        footer {
            background-color: #007bff; /* Azul */
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>
<body>
<header>
    <h1>@yield('header')</h1> 
</header>


<div class="content">
<div style="margin-top: 20px;">
        <h2>{{ $topic->title }}</h2>
        <p><strong>Criado por:</strong> {{ $topic->post->user->name ?? 'Usuário não encontrado' }}</p>
        <p><strong>Status:</strong> {{ $topic->status == 0 ? 'Fechado' : 'Aberto' }}</p>
        <p><strong>Descrição:</strong> {{ $topic->description }}</p>
        <p><strong>Categoria:</strong> {{ $topic->category->title ?? 'Categoria não encontrada' }}</p>
        @if(isset($topic->post->image) && !empty($topic->post->image))
        <img src="{{ asset('storage/' . $topic->post->image) }}" alt="Imagem do Tópico" style="max-width: 450px;">
        @else
            <p>Imagem não disponível</p>
        @endif

        @if($topic->post->user_id == Auth::id())
    <form action="{{ route('DeleteTopic', [$topic->id]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este tópico?');">
            Deletar
        </button>
    </form>
@endif
        </div>

         <!-- Formulário para adicionar comentário -->
         <h3>Adicionar Comentário</h3>
        <form action="{{ route('storeComment', $topic->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <textarea name="content" placeholder="Escreva seu comentário..." required></textarea><br>

            <label for="image">Imagem (opcional):</label><br>
            <input type="file" name="image" accept="image/*"><br><br>

            <button type="submit" class="btn btn-primary">Adicionar Comentário</button>
        </form>

        <hr>

        <!-- Exibir Comentários -->
        <h3>Comentários</h3>
        @foreach($topic->comments as $comment)
            <div class="comment">
                <p><strong>{{ $comment->post->user->name ?? 'Usuário não encontrado' }}</strong></p>
                <p>{{ $comment->content }}</p>
                @if($comment->post->image)
                    <img src="{{ asset('storage/' . $comment->post->image) }}" alt="Imagem do Comentário" style="max-width: 200px;">
                @else
                    <p>Imagem não disponível</p> 
                @endif
                @if($comment->post->user_id == Auth::id())
            <form action="{{ route('deleteComment', $comment->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <br/>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este comentário?');">Excluir</button>
            </form>
        @endif
            </div>
        @endforeach
    </div>

    </div>
    
</div>

<footer>
    <p>Rodapé - © 2024</p>
</footer>

</body>
</html>