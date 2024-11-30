<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Garotas Pops - Blog</title>

    <!-- Fonts -->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@0500;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>
    <header>
        <a href="#" class="logo"><i class="ri-home-heart-fill"></i><span>Logo</span></a>
            @auth
                <h3>Seja Bem-vindo(a), {{ Auth::user()->name }}!</h3>
            @else
                <h3>Seja Bem-vindo(a)!</h3>
            @endauth
        <ul class="navbar">
            <li><a href="{{ url('/') }}" class="active">Pagina Inicial</a></li>
            @auth
                <li><a href="{{ route('ListUser', ['uid' => Auth::user()->id]) }}" class="">Perfil</a></li>
                <li><a href="{{ route('logout') }}" class="">Sair</a></li>
            @else
                <li><a href="{{ route('login') }}" class="">Entrar</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="">Cadastrar</a></li>
                @endif
            @endauth
        </ul>
        <div class="main">
            <a href="#" class="user"><i class="ri-user-heart-line"></i>Entrar</a>
            <a href="#" class="user">Cadastrar</a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
    <script type="text/javascript" src="js/menu.js"></script>

    <div class="container">
    <h1>Garotas Pops</h1>
    <div class="content">
        <img class="capa" src="imgs/decria.png" alt="Imagem Garotas Pops">
        <div class="text-section">
            <p>Oiii! Aqui no nosso blog girly, você poderá discutir sobre as maiores garotas pops do década! E se tornar uma de nós &#10024;</p>
                </br>
            <div class="divider"></div>
                </br>
            <p>Texto sobre as Garotas Pops, explicando mais sobre o contexto ou destacando informações relevantes.</p>
        </div>
    </div>
</div>

</body>
</html>
