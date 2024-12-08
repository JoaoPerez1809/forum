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
        <h2>{{ $tag->title }}</h2> 
            <form action="{{ route('UpdateTag', [$tag->id]) }}" method="post">
                @csrf
                @method('put')
                <label for="title">Título</label>
                <input type="text" id="title" name="title" placeholder="Título" value="{{ $tag->title }}" required>
                
                <input type="submit" value="Editar" class="btn-edit">
            </form>
            <form action="{{ route('DeleteTag', [$tag->id]) }}" method="post" style="display:inline;">
                @csrf
                @method('delete')
                <button type="submit" class="btn-delete" onclick="return confirm('Tem certeza que deseja deletar esta tag?');">Deletar</button>
            </form>
        </div>
</div>
@endsection