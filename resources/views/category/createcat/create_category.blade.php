@push('styles')
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
<link rel="stylesheet" href="{{ asset('css/editcategory.css') }}">
@endpush
@extends('layouts.layout')

@section('title', 'Página Inicial')

@section('content')

<div class="container">
    <h1>Cadastrar Categoria</h1>
    <form id="registration-form" action="{{ route('CreateCategory') }}" method="post">
        @csrf
        <label for="category">Categoria</label>
        <input type="text" id="title" name="title" placeholder="Nome da Categoria" value="{{ old('title') }}" required>
        @error('title') <span class="error">{{ $message }}</span> @enderror

        <label for="description">Descrição</label>
        <textarea id="description" name="description" placeholder="Descrição da Categoria" rows="4">{{ old('description') }}</textarea>
        @error('description') <span class="error">{{ $message }}</span> @enderror

        <input type="submit" value="Cadastrar" id="submit-button">
    </form>
</div>
@endsection