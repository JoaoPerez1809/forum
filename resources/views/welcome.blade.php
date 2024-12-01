@push('styles')
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endpush
@extends('layouts.layout')

@section('title', 'Página Inicial')

@section('content')
    <div class="container">
        <h1>Garotas Pops</h1>
            <div class="content">
                <img class="capa" src="imgs/decria.png" alt="Imagem Garotas Pops">
                <div class="text-section">
                    <p>Oiii! Aqui no nosso blog girly, você poderá discutir sobre as maiores garotas pops do década! E se tornar uma de nós &#10024;</p>
                        </br>
                    <div class="divider"></div>
                        </br>
                    <p>Mas o que é ser uma garota pop? Bom, é uma pessoa descolada e desencanada que faz diversos amigos, anda na moda, lança moda, tem estilo e mostra atitude. Aonde vai atrai olhares, e por isso é conhecida, as pessoas falam dela e ela tem "contatos" em todo lugar. As vezes, a gente por ser descolada, até intimida um pouco, mas é isso que nós DIVAS fazemos. &#128139;</p>
                </div>
            </div>
    </div>
    
 @endsection