@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb mb-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="text-decoration-none font-weight-600" style="color: black;">Inicio</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('productos') }}" class="text-decoration-none font-weight-600" style="color: black;">Productos</a></li>
                <li class="breadcrumb-item active color-link-gris" aria-current="page">{{$product->name}}</li>            
            </ol>
        </nav>  
    </div>
</div>
<div>
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <ul class="p-0" style="list-style: none;">
                    <li class="py-2 active">
                        <a href="{{ route('producto', ['product' => $product->id]) }}" class="color-link-gris text-decoration-none">{{$product->name}}</a>
                    </li>       
                    @if (count($products))
                        @foreach ($products as $p)
                            <li class="py-2">
                                <a href="{{ route('producto', ['product' => $p->id]) }}" class="color-link-gris text-decoration-none">{{$p->name}}</a>
                            </li>                       
                        @endforeach      
                    @endif
                </ul>             
            </aside>
            <section class="producto col-sm-12 col-md-9 font-size-14">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div id="carouselProduct" class="carousel slide border border-light border-2 mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @if (count($product->images))
                                    @foreach ($product->images as $k => $pi)
                                        <div class="carousel-item  @if(!$k) active @endif">
                                            <img src="{{ asset($pi->image) }}" class="d-block w-100 img-fluid" style="object-fit: cover;
                                            min-height: 240px; min-width: 100%; max-width: 100%;" alt="{{$product->name}}">
                                        </div>                                    
                                    @endforeach
                                @else 
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/products/Image_321.png') }}" class="d-block w-100 img-fluid" style="object-fit: contain; min-width: 100%; max-width: 100%;"> 
                                    </div>                                   
                                @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="d-sm-none d-md-block">
                            <ul class="d-flex p-0" style="list-style: none; overflow: hidden;">
                                @foreach ($product->images as $pi)
                                    <li class="me-2" style="border:1px solid #FD0D1B">
                                        <img src="{{ asset($pi->image) }}" width="85" height="65" style="object-fit: cover;">
                                    </li>                 
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="mb-4">
                            <h1 class="mb-4 font-size-28 text-uppercase" style="color: #000000ab;">{{ $product->name }}</h1>
                            @if ($product->description)
                            <div class="div mb-3 font-size-15">
                                <strong class="fw-bold">Presentaci&oacute;n</strong>
                                <div style="color:gray; word-break: break-all;">{!! $product->description !!}</div>
                            </div>               
                            @endif
                            @if (count($product->applications))
                            <div class="div mb-3">
                                <strong class="d-block mb-3">Aplicaci&oacute;n</strong>
                                <ul class="d-flex flex-wrap p-0" style="list-style: none;">
                                    @foreach($product->applications as $application)
                                    <li class="me-2 mb-2" style="text-decoration: underline; color: #E12328; font-weight: bold; font-size: 13px;"> {{ $application->name }} </li>                                        
                                    @endforeach
                                </ul>
                            </div>                            
                            @endif
                            @if (count($product->colors))
                            <div class="div mb-5">
                                <strong class="d-block mb-3">Colores</strong>
                                <ul class="d-flex flex-wrap p-0" style="list-style: none;">
                                    @foreach($product->colors as $colorProduct)
                                    <li class="me-2 mb-2"><img src="{{ asset($colorProduct->color) }}" style="height:18px; width:39px;"></li>                               
                                    @endforeach
                                </ul>
                            </div>     
                            @endif
                            <a href="{{ route('contacto') }}" class="btn bg-red text-white fw-bold py-2 px-5 text-uppercase rounded-pill font-size-14">Consultar</a>
                        </div>
                    </div>
                    @if (count($relatedProducts))
                        <div class="col-sm-12 mt-5">
                            <h2 class="mb-3 font-size-20">Productos relacionados</h2>
                            <div class="row">
                                @foreach ($relatedProducts as $rp)
                                    <div class="col-sm-12 col-md-4 mb-4">
                                        @includeIf('paginas.partials.producto', ['product' => $rp])
                                    </div>					
                                @endforeach
                            </div>
                        </div>              
                    @endif
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@push('head')
@endpush
@push('scripts')
@endpush





