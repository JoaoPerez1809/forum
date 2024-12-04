@push('styles')
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<link rel="stylesheet" href="{{ asset('css/editcategory.css') }}">
@endpush
@extends('layouts.layout')

@section('title', 'Página Inicial')

@section('content')

<div class="container">
    <div class="category-details">
        <h2>{{ $category->title }}</h2>
        <p><strong>Descrição:</strong> {{ $category->description }}</p>

        <div class="action-buttons">
            <form action="{{ route('UpdateCategory', [$category->id]) }}" method="post" class="update-form">
                @csrf
                @method('put')
                <label for="title">Título</label>
                <input type="text" id="title" name="title" placeholder="Título" value="{{ $category->title }}" required>

                <label for="description">Descrição</label>
                <textarea id="description" name="description" placeholder="Descrição" required>{{ $category->description }}</textarea>

                <input type="submit" value="Editar" class="btn btn-warning">
            </form>

            <form action="{{ route('DeleteCategory', [$category->id]) }}" method="post" class="delete-form">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta categoria?');">Deletar</button>
            </form>
        </div>
    </div>
</div>

@endsection