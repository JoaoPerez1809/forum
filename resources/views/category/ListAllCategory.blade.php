@push('styles')
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
@endpush
@extends('layouts.layout')

@section('title', 'Página Inicial')

@section('content')
<div class="container">
    <table class="girly-table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($categories))
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            <a href="{{ route('showCategory', $category->id) }}">{{ $category->title }}</a>
                        </td>
                        <td>{{ $category->description }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <a href="{{ route('CreateCategory') }}" class="btn-create-category">Criar Categoria</a>
</div>

   
@endsection