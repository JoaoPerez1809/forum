@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endpush
@push('scripts')
<script type="text/javascript" src="js/menu.js"></script>
@endpush
<header>
    <a href="/" class="logo"><i class="ri-home-heart-fill"></i><span>GPop</span></a>
    <ul class="navbar">
        <li>  
            @auth
                <a>Bem-vindo(a), {{ Auth::user()->name }} &#127827; </a>
            @else
                <a>Bem-vindo(a)&#127827;</a>
            @endauth
        </li>
        @auth
            <li><a href="" class="">Tópicos <i class='bx bxs-book-heart'></i></a></li>
        @endauth
        <li><a href="#feed" class="">Feed Pops <i class="ri-heart-2-fill"></i></a></li>
    </ul>
    <div class="main">
        @auth
            <li><a href="{{ route('ListUser', ['uid' => Auth::user()->id]) }}" class=""><i class="ri-user-heart-line"></i>Perfil</a></li>
            <li><a href="{{ route('logout') }}" class="">Sair</a></li>
        @else
            @if (Route::has('register'))
                <li><a href="{{ route('register') }}" class=""><i class="ri-user-heart-line"></i>Entrar</a></li>
                <li><a href="{{ route('register') }}" class="">Cadastrar</a></li>
            @endif
        @endauth
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
</header>

