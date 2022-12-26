@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class=" text-decoration-none font-weight-600" style="color: black;">Inicio</a>
                </li>
                <li class="breadcrumb-item active color-link-gris" aria-current="page">Solicitud de presupuesto</li>                
            </ol>
        </nav>  
    </div>
</div>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
    @endif
    @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
    @endif
    
    <form action="{{ route('send-quote') }}" method="post" id="cotizadorOnline" enctype="multipart/form-data" class="py-sm-2 py-md-5" style="color: #666666;">
        @csrf
        <div id="section1">
            <div class="w-75 w-sm-100 mx-auto">
                <img src="{{ asset('images/s1.png') }}" alt="" class="mx-auto img-fluid mb-3 d-sm-none d-md-block" style="max-height: 200px; object-fit: contain; max-width: 450px;">
                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Ingresar el nombre *">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Ingresar el apellido *">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Ingrese su correo electrónico *">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Ingrese su teléfono *">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end py-3">
                    <button type="button" id="btnS1" class="btn btn-outline-danger text-uppercase fw-bold font-size-20 py-2 px-md-5 px-sm-3 text-uppercase rounded-pill" style="border-radius: 0;">Siguiente</button>
                </div>
            </div>
        </div>
        <div id="section2" class="d-none">
            <div class="w-75 w-sm-100 mx-auto">
                <img src="{{ asset('images/s2.png') }}" alt="" class="d-block mx-auto img-fluid d-sm-none d-md-block" style="max-height: 200px;  object-fit: contain; max-width: 450px;">
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <textarea name="message" class="form-control" cols="30" rows="5">{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 mb-sm-3 mb-md-5 position-relative">
                        <div class="input-group mb-2 mr-sm-2">
                            <input type="text" class="form-control" placeholder="examinar..." style="padding: 0; padding-left: 10px;">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-folder"></i></div>
                            </div>
                        </div>
                        <input type="file" name="file" class="form-control-file position-absolute" 
                        style="top: 2.5px; left: 15px; width: 100%; cursor: pointer;">
                    </div>
                </div>
                <div class="d-flex justify-content-between py-3">
                    <button type="button" id="btnS2" data-mover="seccion2" class="btn btn-outline-danger text-uppercase fw-bold font-size-20 py-2 px-md-5 px-sm-3 text-uppercase rounded-pill" style="border-radius: 0">Anterior</button>
                    <button type="submit" class="btn text-uppercase text-white bg-red fw-bold px-md-5 px-sm-3 font-size-20 rounded-pill">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/quote.js') }}"></script>
@endpush