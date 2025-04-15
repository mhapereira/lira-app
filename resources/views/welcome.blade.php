@extends('layout.app')
 
@section('title', 'Comovi')
<style>
#inicio, #eventos {
    background-color: {{ $theme->primary_color }};
    color: {{ $theme->text_color }};
}
#inicio {
	background-image: url('{{ asset("storage/{$theme->image}") }}');
    background-size: cover; /* Ajusta o tamanho do background */
    background-position: center; /* Centraliza o background */
    background-repeat: no-repeat; /* Evita que o background se repita */
}

#comunicado, #footer {
    background-color: {{ $theme->secondary_color }};
}

</style>
{{-- Inicio --}}
<section id="inicio">
	<main class="container pt-5 mt-5">
		<div class="row">
			<!-- Imagem -->
			<div class="col-12 col-lg-6 d-flex align-items-center"  style="min-height: 500px">
				<img  src="{{ asset('storage/image_ia/kv_inicial.png') }}" style="max-height: 500px" alt="Imagem Exemplo" class="img-fluid mx-auto @if(!is_null($theme->image)) d-none @endif">
			</div>
			<!-- Texto -->
			<div class="col-12 col-lg-6 d-flex flex-column justify-content-center p-4">
				<h1 class="display-5 mb-4 montserrat-bold">🎶 Bem-vindo à Lira Guaribense!</h1>
				<p class="">
					Descubra a harmonia que conecta gerações e inspira a cidade de Guariba. 
					A Lira Guaribense é mais que uma banda — é uma tradição viva que pulsa através da música, da cultura e do amor pela arte.
					Junte-se a nós em apresentações, ensaios e projetos que fortalecem nossa identidade cultural e musical.
					<br>
					Porque cada nota tocada é uma celebração da nossa história!
				</p>
			</div>
		</div>
	</main>
</section>

{{-- Comunicados --}}
<section id="comunicado">
	<div class="container py-5 @if($comunicados->isEmpty()) d-none @endif">
		<div class="swiper">
			<div class="swiper-wrapper">

				@foreach ($comunicados as $comunicado)
					<div class="swiper-slide my-auto">
						<div class="card text-small text-warning-emphasis bg-warning-subtle border border-warning-subtle" data-bs-toggle="modal" data-bs-target="#comunicadoModal{{ $comunicado->id }}">
							<div class="card-body text-center">
								<h5 class="card-title montserrat-bold">{{ $comunicado->titulo }}</h5>
								<p class="card-text mb-0">{{ Str::limit($comunicado->descricao, 30) }}</p>
							</div>
						</div>
					</div>
				@endforeach

			</div>
		</div>
	</div>

	<!-- Modals -->
	@foreach ($comunicados as $comunicado)
	<div class="modal fade" id="comunicadoModal{{ $comunicado->id }}" tabindex="-1" aria-labelledby="comunicadoModalLabel{{ $comunicado->id }}" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered"> <!-- Centraliza o modal na tela -->
			<div class="modal-content text-small text-warning-emphasis bg-warning-subtle border border-warning-subtle"> <!-- Aplica o mesmo design do card -->
				<div class="modal-header">
					<h5 class="modal-title montserrat-bold" id="comunicadoModalLabel{{ $comunicado->id }}">{{ $comunicado->titulo }}</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body text-center">
					{{ $comunicado->descricao }}
				</div>
			</div>
		</div>
	</div>
	@endforeach
</section>

{{-- Sobre nós --}}
<div class="container text-center my-5 pb-5" id="sobre">
	<div class="w-lg-75 w-100 mx-auto">
	<h2 class="display-5 montserrat-bold py-5 my-5">🎺 Sobre Nós</h2>
	<p>
		Bem-vindo ao site oficial da <strong>Lira Guaribense</strong>, um verdadeiro patrimônio cultural de <strong>Guariba-SP</strong>, 
		que desde <strong>1964</strong> dedica-se a preservar e propagar a música instrumental com excelência e paixão.
	</p>
	<p>
		Fundada por músicos visionários e amantes da arte, a Lira nasceu do desejo de manter viva a tradição das bandas musicais 
		e de formar novas gerações de instrumentistas em nossa cidade. Desde então, a Lira Guaribense tem sido protagonista em momentos 
		marcantes da história local, presente em eventos <strong>cívicos, religiosos e culturais</strong>, sempre levando consigo a emoção, 
		a disciplina e o encantamento da música de banda.
	</p>
	<p>
		Em sua trajetória, a Lira transformou vidas, despertou talentos e uniu gerações em torno de uma causa nobre: 
		<strong>a música como instrumento de cultura, cidadania e união</strong>.
	</p>
	<p class="mb-5">
		Nosso compromisso é seguir tocando os corações guaribenses, formar músicos com dedicação e amor, 
		e perpetuar uma história que já é orgulho de toda a cidade.<br>
		<strong>Conheça a Lira Guaribense e sinta o poder da música que emociona, inspira e transforma.</strong>
	</p>
	</div>
</div>

{{-- Eventos --}}
<section id="eventos">
	<div class="container py-5 @if($eventos->isEmpty()) d-none @endif" id="eventos">
		<h2 class="text-center display-5 montserrat-bold ">Eventos</h2>

		<div class="swiper py-5">
			<div class="swiper-wrapper">

				@foreach ($eventos as $evento)
				<div class="swiper-slide">
					<div class="card" data-bs-toggle="modal" data-bs-target="#eventoModal{{ $evento->id }}">
						<img src="{{ asset('storage/' . $evento->path ) }}" class="card-img-top" alt="Evento 1">
						<div class="card-body">
							<h5 class="card-title">{{ $evento->titulo }}</h5>
							<p class="card-text">{{ Str::limit($evento->descricao, 45) }}</p>
							<p class="card-text"><small class="text-muted">Data: {{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y H:i') }}</small></p>
							<p class="card-text @if($evento->valor == 0) d-none @endif"><strong>R$ {{ number_format($evento->valor, 2, ',', '.') }}</strong></p>
						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>

	<!-- Modal -->
	@foreach ($eventos as $evento)
	<div class="modal fade text-dark" id="eventoModal{{ $evento->id }}" tabindex="-1" aria-labelledby="eventoModalLabel{{ $evento->id }}" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title montserrat-bold" id="eventoModalLabel{{ $evento->id }}">{{ $evento->titulo }}</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<img src="{{ asset('storage/' . $evento->path ) }}" class="img-fluid mb-3" alt="Evento {{ $evento->titulo }}">
					<p>{{ $evento->descricao }}</p>
					<p><small class="text-muted">Data: {{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y H:i') }}</small></p>
					<p class="@if($evento->valor == 0) d-none @endif"><strong>R$ {{ number_format($evento->valor, 2, ',', '.') }}</strong></p>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</section>

{{-- Galeria --}}
<div class="container my-5 @if($galeria->isEmpty()) d-none @endif" id="galeria">
	<h2 class="display-5 text-center mb-4 montserrat-bold py-5 my-5">Galeria</h2>
	<div class="row g-2">

		@foreach ($galeria as $galeri)
			<div class="col-lg-3 col-sm-6">
				<div class="card">
					<!-- Primeira imagem do grupo -->
					<a href="{{ asset('storage/' . $galeri->path[0]) }}" data-lightbox="gallery-{{ $galeri->id }}" data-title="{{ $galeri->descricao }}">
						<img src="{{ asset('storage/' . $galeri->path[0]) }}" alt="{{ $galeri->descricao }}" 
						style="width: 100%; height: auto; object-fit: cover; aspect-ratio: 4 / 3;"
						class="img-fluid rounded">
					</a>
					<div class="card-body">
						<h5 class="card-title">{{ $galeri->descricao }}</h5>
					</div>
				</div>
			</div>

			<!-- Imagens adicionais do grupo -->
			@foreach ($galeri->path as $path)
				<a href="{{ asset('storage/' . $path) }}" data-lightbox="gallery-{{ $galeri->id }}" data-title="{{ $galeri->descricao }}" style="display: none;"></a>
			@endforeach
		@endforeach
				
	</div>
</div>

{{-- Seção com Mapa --}}
<section class="mt-5" id="contatos">
	<div class="embed-responsive" style="position: relative; height: 500px;">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3715.7827002193817!2d-48.22408958915548!3d-21.359064780292325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b90e38d13fb95d%3A0x494f30269f0d4605!2sAv.%20V%C3%ADctor%20Valentie%20de%20Oliveira%2C%20450%20-%20Jardim%20Progresso%2C%20Guariba%20-%20SP%2C%2014840-000!5e0!3m2!1sen!2sbr!4v1744471429841!5m2!1sen!2sbr"
						style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
						allowfullscreen=""
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade">
		</iframe>
	</div>
</section>