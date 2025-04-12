<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Comovi</title>
		<meta name="description" content="Descubra como é viver com plenitude e alegria na melhor fase da vida. 
								Junte-se a nós em atividades enriquecedoras, eventos sociais, 
								e momentos de aprendizado que promovem saúde, bem-estar e amizade.">
		<meta name="keywords" content="terceira idade, melhor idade, guariba">
		<meta name="robots" content="index, follow">
		
		<!-- Open Graph -->
		<meta property="og:title" content="Comovi">
		<meta property="og:description" content="Descubra como é viver com plenitude e alegria na melhor fase da vida. 
								Junte-se a nós em atividades enriquecedoras, eventos sociais, 
								e momentos de aprendizado que promovem saúde, bem-estar e amizade.">
		<meta property="og:image" content="{{ asset('storage/image_ia/kv_inicial.png') }}">
		<meta property="og:url" content="URL da Página">
		<meta property="og:type" content="website">
	
		<!-- Twitter Cards -->
		<meta name="twitter:card" content="{{ asset('storage/image_ia/kv_inicial.png') }}">
		<meta name="twitter:title" content="Comovi">
		<meta name="twitter:description" content="Descubra como é viver com plenitude e alegria na melhor fase da vida. 
								Junte-se a nós em atividades enriquecedoras, eventos sociais, 
								e momentos de aprendizado que promovem saúde, bem-estar e amizade.">
		<meta name="twitter:image" content="{{ asset('storage/image_ia/kv_inicial.png') }}">
	
		<!-- Structured Data -->
		<script type="application/ld+json">
		{
		  "@context": "https://comovimelhoridade.org",
		  "@type": "WebPage",
		  "name": "Nome da Página",
		  "description": "Descrição da Página",
		  "url": "URL da Página"
		}
		</script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Styles -->
		@vite(['resources/css/app.css', 'resources/js/app.js'])

		{{-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> --}}

		<!-- Link para Lightbox2 CSS -->
		{{-- <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet"> --}}

    </head>
    <body class="montserrat">

        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg fixed-top bg-blur">
            <div class="container">
                <a class="navbar-brand montserrat-bold" href="{{ route('site.home') }}">COMOVI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-lg-flex d-block w-100 justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('site.home') }}#sobre">Sobre nós</a>
                            </li>
                            <li class="nav-item @if($galeria->isEmpty()) d-none @endif">
                                <a class="nav-link" href="{{ route('site.home') }}#galeria">Galeria</a>
                            </li>
                            <li class="nav-item @if($eventos->isEmpty()) d-none @endif">
                                <a class="nav-link" href="{{ route('site.home') }}#eventos">Eventos</a>
                            </li>
                            <li class="nav-item @if($comunicados->isEmpty()) d-none @endif">
                                <a class="nav-link" href="{{ route('site.home') }}#comunicado">Comunicado</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('site.home') }}#contatos">Contato</a>
                            </li>
                            <li class="nav-item @if(is_null($instituto)) d-none @endif">
                                <a class="nav-link" href="{{ route('site.instituto') }}">Transparência</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="pb-5">
            @yield('content')
        </div>
        
        {{-- Rodape --}}
        <footer id="footer" class="bg-dark text-white pt-4">
            <div class="container">
                <div class="row montserrat">
                    <!-- Coluna 1: Título -->
                    <div class="col-md-4 col-lg-6">
                        <h5 class="montserrat-bold">
                            Obrigado por seu apoio e
                            confiança na Comovi!
                        </h5>
                    </div>
                    <!-- Coluna 2: Endereço -->
                    <div class="col-md-4 col-lg-3">
                        <p class="montserrat-bold">Endereço</p>
                        <p class="small">
                            Avenida Luiz Barichello, 644<br>
                            Jardim Progresso<br>
                            Guariba - SP <br>
                            <strong>CNPJ</strong>
                            03.674.621/0001-49
                        </p>
                    </div>
                    <!-- Coluna 3: Contatos -->
                    <div class="col-md-4 col-lg-3">
                        <p class="montserrat-bold">Contatos</p>
                        <p  class="small">
                            <span class="@if(is_null($contatos->email)) d-none @endif"><strong>E-mail</strong> {{ $contatos->email }}</span> <br>
                            <span class="@if(is_null($contatos->telefone)) d-none @endif"><strong>Tel.</strong> {{ $contatos->telefone }}</span> <br>
                            <span class="@if(is_null($contatos->whatsapp)) d-none @endif"><strong>WhatsApp</strong> {{ $contatos->whatsapp }}</span>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <p class="text-center small">© 2024 Todos os direitos reservados | Desenvolvido por Mateus Pereira.</p>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>
