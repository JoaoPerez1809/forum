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
<div class="action-buttons" style="margin-top: 20px;">
<form action="{{ route('UpdateTopic', [$topic->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <!-- Título -->
    <label for="title">Título:</label><br>
    <input type="text" id="title" name="title" value="{{ $topic->title }}" required><br><br>

    <!-- Descrição -->
    <label for="description">Descrição:</label><br>
    <textarea id="description" name="description" required>{{ $topic->description }}</textarea><br><br>

    <!-- Categoria -->
    <label for="category">Categoria:</label><br>
    <select id="category" name="category" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $topic->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->title }}
            </option>
        @endforeach
    </select><br><br>

    <!-- Status -->
    <label for="status">Status:</label><br>
    <select id="status" name="status" required>
        <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Aberto</option>
        <option value="0" {{ $topic->status == 0 ? 'selected' : '' }}>Fechado</option>
    </select><br><br>

    <!-- Imagem atual -->
    <p>Imagem atual:</p>
    @if(isset($topic->post->image) && !empty($topic->post->image))
        <img src="{{ asset('storage/' . $topic->post->image) }}" alt="Imagem do Tópico" style="max-width: 400px;"><br>
    @else
        <p>Imagem não disponível.</p>
    @endif

    <!-- Upload de nova imagem -->
    <label for="image">Substituir imagem:</label><br>
    <input type="file" id="image" name="image" accept="image/*"><br><br>

    <!-- Botão de envio -->
    <input type="submit" value="Atualizar Tópico">
</form>

            </div>
</div>

<footer>
    <p>Rodapé - © 2024</p>
</footer>

</body>
</html>