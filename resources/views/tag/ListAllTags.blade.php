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
    <table>
        <thead>
            <tr>
                <th>Título</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)  
                <tr>
                    <td><a href="{{ route('showTag', $tag->id) }}">{{ $tag->title }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('CreateTag') }}">Criar Tag</a>
</div>
@endsection