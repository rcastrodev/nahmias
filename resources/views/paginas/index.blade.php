@extends('paginas.partials.app')
@section('content')
@if(count($section1s))
	<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			@foreach ($section1s as $k => $item)
				<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner">
			@foreach ($section1s as $key => $slider)
				<div class="carousel-item @if(!$key) active @endif hero" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.1)), url({{$slider->image}}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
					<div class="carousel-caption text-start">
						<h1 class="text-uppercase font-size-23 fw-light">{{ $slider->content_1 }}</h1>
						<p class="font-size-36 fw-bold">{{ $slider->content_2 }}</p>
					</div>
				</div>			
			@endforeach
		</div>	
	</div>	
@endif
@if (count($products))
	<section class="py-sm-4 py-md-5">
		<div class="container">
			<div class="row">
				<h2 class="col-sm-12 mb-5 text-uppercase text-center color-primario font-size-26">Nuestros Productos</h2>
				@foreach ($products as $product)
					<div class="col-sm-12 col-md-3 mb-4">
						@includeIf('paginas.partials.producto', ['product' => $product])
					</div>					
				@endforeach
				<div class="col-sm-12 text-center">
					<a href="{{ route('productos') }}" class="bg-red text-uppercase btn py-3 px-5 rounded-pill text-white fw-bold my-4">ver más productos</a>
				</div>	
			</div>
		</div>
	</section>	
@endif
@if ($section2)
	<section id="section2" class="py-sm-4 py-md-5 text-white" style="background-image: url({{ asset($section2->image) }}); background-color: #c72323d9; background-blend-mode: overlay; background-size: 100% 100%;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 mx-auto text-center">
					<h4 class="mb-2 mt-3 font-size-24 text-uppercase">{{$section2->content_1}}</h4>
					<h2 class="mb-4 font-size-30 fw-bold my-3 text-center mx-auto" style="max-width: 1030px; letter-spacing: 0.9px; line-height: 40px;">{{$section2->content_2}}</h2>
					<a href="{{ route('contacto') }}" class="text-uppercase btn bg-red py-3 px-5 rounded-pill text-white fw-bold mb-5">Más información</a>
				</div>
			</div>
		</div>
	</section>	
@endif
@endsection
@push('head')
@endpush
@push('scripts')
@endpush
