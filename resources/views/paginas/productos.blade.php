@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class=" text-decoration-none font-weight-600" style="color: black;">Inicio</a>
                </li>
                <li class="breadcrumb-item active color-link-gris" aria-current="page">Productos</li>                
            </ol>
        </nav>  
    </div>
</div>
<div class="my-sm-2 my-md-5">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <ul class="p-0" style="list-style: none;">
                    <li class="py-2 active"> 
                        <a href="#" class="toggle d-block p-2 color-link-gris text-decoration-none text-decoration-none font-size-15">Productos</a>
                    </li>  
                    @if (count($products))
                        @foreach ($products as $p)
                            <li class="py-2"> 
                                <a href="{{ route('producto', ['product' => $p->id]) }}" class="d-block p-2 text-decoration-none  text-decoration-none color-link-gris font-size-15">{{$p->name}}</a>
                            </li>                        
                        @endforeach      
                    @endif
                </ul>             
            </aside>
            <section class="producto col-sm-12 col-md-9 font-size-14">
                <div class="row mb-5">
                    @foreach ($products as $product)
                        <div class="col-sm-12 col-md-4 mb-4">
                            @includeIf('paginas.partials.producto', ['product' => $product])
                        </div>					
				    @endforeach
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





