@push('styles')
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
@endpush
@extends('layouts.layout')

@section('title', 'Página Inicial')

@section('content')
    <div class="container">
        <h1>Perfil</h1>
        <span>{{ session('message') }}</span>
            <div class="user-icon">
        @if($user->photo)
            <img src="{{ asset('storage/' . $user->photo) }}" class="perfil-img" alt="Foto do Usuário">
        @else
        <img src="../imgs/perfil-default.png" class="perfil-img" alt="Foto do Usuário">
        @endif
    </div>

        @if($user != null)
        <form id="registration-form" action="{{ route('UpdateUser', [$user->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="profile-fields">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" placeholder="Nome" value="{{ $user->name}}" required>
                @error('name') <span class="error">{{ $message }} </span> @enderror

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="E-mail" value="{{ $user->email}}" required>
                @error('email') <span class="error">{{ $message }} </span> @enderror

                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Senha">
                @error('password') <span class="error">{{ $message }} </span> @enderror

                <label for="image" class="form-label">Selecionar Foto</label>
                <input type="file" id="image" name="image" class="form-control">
                @error('image') <span class="error">{{ $message }}</span> @enderror<br/>
                
            </div>
            <div class="action-buttons">
                <form id="edit-form" action="{{ route('UpdateUser', [$user->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <input type="submit" value="Editar" id="submit-button">
                </form>
                <form id="delete-form" action="{{ route('DeleteUser', [$user->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Deletar" id="delete-button">
                </form>
            </div>
        </form>
        @endif
    </div>
    <!--div class="profile-container">
    <div class="profile-header">
        <h1>Perfil</h1>
        <span>{{ session('message') }}</span>

        
    </div>
</div-->
@endsection