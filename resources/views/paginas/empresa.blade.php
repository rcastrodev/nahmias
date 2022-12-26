@extends('paginas.partials.app')
@section('content')
@if (count($sliders))
	<div id="sliderHeroEmpresa" class="carousel slide position-relative" data-bs-interval	="3000" data-bs-ride="carousel">
		<div class="contenedor-breadcrumb position-absolute w-100" style="z-index: 100">
			<div class="container">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb text-uppercase py-2 font-size-13 mb-0">
						<li class="breadcrumb-item">
							<a href="{{ route('index') }}" class=" text-decoration-none font-weight-600" style="color: black;">Inicio</a>
						</li>
						<li class="breadcrumb-item active color-link-gris" aria-current="page">Empresa</li>
					</ol>
				</nav>  
			</div>
		</div>
		<div class="carousel-indicators">
			@foreach ($sliders as $k => $v)
				<button type="button" data-bs-target="#sliderHeroEmpresa" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner" >
			@foreach ($sliders as $k => $v)
				<div class="carousel-item @if(!$k) active @endif">
					<img src="{{ asset($v->image) }}" class="d-block w-100" alt="...">
				</div>			
			@endforeach
		</div>	
	</div>	
@endif
@if ($company)
	<section id="section_2" class="py-sm-2 py-md-5">
		<div class="container py-sm-0 py-md-3">
			<div class="row">
				<div class="col-sm-12 col-md-6 mb-4 font-size-15">
					<h4 class="color-primario mb-4 font-size-20">{{ $company->content_1}}</h4>
					<div>{!! $company->content_2 !!}</div>	
				</div>
				@isset($company->content_3)
					<div class="col-sm-12 col-md-6 iframe">{!! $company->content_3 !!}</div>			
				@endisset
			</div>
		</div>
	</section>	
@endif
@endsection
@push('head')
	<meta name="keywords" content="{{$page->keywords}}">
@endpush
