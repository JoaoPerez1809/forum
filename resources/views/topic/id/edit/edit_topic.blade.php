@push('styles')
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<link rel="stylesheet" href="{{ asset('css/topic.css') }}">
<link rel="stylesheet" href="{{ asset('css/editcategory.css') }}">
@endpush

@extends('layouts.layout')

@section('title', 'Página Inicial')

@section('content')
<div class="container">
    <form id= "registration-form" action="{{ route('UpdateTopic', [$topic->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Título:</label><br>
            <input type="text" id="title" name="title" value="{{ $topic->title }}" required><br><br>

            <label for="description">Descrição:</label><br>
            <textarea id="description" name="description" required>{{ $topic->description }}</textarea><br><br>

            <label for="category">Categoria:</label><br>
            <select id="category" name="category" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $topic->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select><br><br>

            <label for="tags">Tags</label><br>
            @foreach ($tags as $tag)
                <label>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        {{ $topic->tags->contains($tag->id) ? 'checked' : '' }}>
                    {{ $tag->title }}<br>
                </label>
            @endforeach
                    
            <label for="status">Status:</label><br>
            <select id="status" name="status" required>
                <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Aberto</option>
                <option value="0" {{ $topic->status == 0 ? 'selected' : '' }}>Fechado</option>
            </select><br><br>

            <p>Imagem atual:</p>
            @if(isset($topic->post->image) && !empty($topic->post->image))
                <img src="{{ asset('storage/' . $topic->post->image) }}" alt="Imagem do Tópico" style="max-width: 400px;"><br>
            @else
                <p>Imagem não disponível.</p>
            @endif
        </div>

        <label for="image">Substituir imagem:</label><br>
        <input type="file" id="image" name="image" accept="image/*"><br><br>

        <input type="submit" value="Atualizar Tópico" id="submit-button">
    </form>
</div>
@endsection