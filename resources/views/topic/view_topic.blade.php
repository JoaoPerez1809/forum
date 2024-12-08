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
    <table class="girly-table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($topics))
                @foreach ($topics as $topic)
                    <tr>
                        <td>
                            <a href="{{ route('showTopic', $topic->id) }}" class="topic-link">{{ $topic->title }}</a>
                        </td>
                        <td>
                            @if($topic->post->user_id == Auth::id())
                                <a href="{{ route('EditTopic', $topic->id) }}" class="btn-edit">Editar</a>
                                <form action="{{ route('DeleteTopic', $topic->id) }}" method="POST" class="delete-form" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('Tem certeza que deseja deletar este tópico?');">
                                        Deletar
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <a href="{{ route('CreateTopic') }}" class="btn-add-topic">Adicionar Tópico</a>
</div>
@endsection