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
    <h1 class="post-title">Criar Tópico</h1>
    <form id="registration-form" action="{{ route('CreateTopic') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" >Título</label>
            <input type="text" name="title" id="title"/>
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" name="description" id="description"/>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" id="status"/>
            @error('status') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="image">Imagem</label>
            <input type="file" name="image" id="image" />
            @error('image') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="category">Categoria</label>
            <select name="category" id="category">
                @if(isset($categories))
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="tags" class="form-label">Tags</label>
            @if(isset($tags))
                <div class="tags-container">
                    @foreach ($tags as $tag)
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag_{{ $tag->id }}" class="form-check-input">
                        <label for="tag_{{ $tag->id }}" class="form-check-label">{{ $tag->title }}</label>
                    @endforeach
                </div>
            @endif
        </div>

        <input type="submit" value="Cadastrar" id="submit-button">
    </form>
</div>

@endsection