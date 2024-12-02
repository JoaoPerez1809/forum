@push('styles')
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<link rel="stylesheet" href="{{ asset('css/feed.css') }}">
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

    <section id="feed">
        <div class="feed-heading">
            <span>Posts Mais Recentes &#x1F618;</span>
            <h3>Pops do Momento &#x1F484;</h3>
        </div>

        <div class="feed-container">

            <div class="feed-box">

                <div class="feed-img">
                    <img src="imgs/feed/Charli-XCX.png" alt="Feed">
                </div>
                <div class="feed-text">
                    <span>25 Novembro 2024 / Festival Próprio</span>
                    <a href="" class="feed-title">Charli XCX inicia turnê no Reino Unido com show em Manchester</a>
                    <p>Responsável pelo disco de estúdio Brat (assim como as duas versões seguintes, Brat and it’s the same but there’s three more songs so it’s not e Brat and It's Completely Different but Also Still Brat), um dos principais lançamentos de 2024, Charli xcx agora terá o próprio festival, chamado Party Girl, que acontecerá dentro do LIDO Festival, em 2025.</p>
                    <a href="">Ler Mais</a>
                </div>

            </div>

            <div class="feed-box">

                <div class="feed-img">
                    <img src="imgs/feed/Chappell-Roan.png" alt="Feed">
                </div>
                <div class="feed-text">
                    <span>25 Novembro 2024 / Festival</span> <!--- aui tera as tags neste / Festival-->
                    <a href="" class="feed-title">Charli XCX inicia turnê no Reino Unido com show em Manchester</a>
                    <p>Responsável pelo disco de estúdio Brat (assim como as duas versões seguintes, Brat and it’s the same but there’s three more songs so it’s not e Brat and It's Completely Different but Also Still Brat), um dos principais lançamentos de 2024, Charli xcx agora terá o próprio festival, chamado Party Girl, que acontecerá dentro do LIDO Festival, em 2025.</p>
                    <a href="">Ler Mais</a>
                </div>

            </div>

            <div class="feed-box">

                <div class="feed-img">
                    <img src="imgs/feed/Sabrina-Carpenter.png" alt="Feed">
                </div>
                <div class="feed-text">
                    <span>30 Novembro 2024 / Looks</span> <!--- aui tera as tags neste / Looks-->
                    <a href="" class="feed-title">Todos os melhores looks vintage usados por Sabrina Carpenter até hoje!</a>
                    <p>Sabrina Carpenter não só nos deu dois dos maiores sucessos de 2024 – “Espresso” e “Please Please Please” –, mas ela também inaugurou um retorno ao glamour old-school da estética bombshell, tanto no palco quanto no tapete vermelho. Exemplo disso é o deslumbrante vestido prateado Bob Mackie que ela e o stylist Jared Ellner escolheram para o VMA. A peça foi inspirada em Marilyn Monroe e usada pela primeira vez por Madonna no Oscar de 1991.</p>
                    <a href="">Ler Mais</a>
                </div>

            </div>

        </div>
    </section>
    
 @endsection