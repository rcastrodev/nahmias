@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="color-azul-oscuro text-decoration-none font-weight-600" style="color: black;">Home</a>
                </li>
                <li class="breadcrumb-item active color-azul-claro" aria-current="page" style="color: black;">contacto</li>
            </ol>
        </nav>
    </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.6130928903763!2d-58.4804880851486!3d-34.61394396554551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc9e5bd928a3d%3A0xcebf3d43dbc1f512!2sGral.%20C%C3%A9sar%20D%C3%ADaz%202849%2C%20C1416%20DWC%2C%20Buenos%20Aires%2C%20Argentina!5e0!3m2!1ses!2sve!4v1628711281422!5m2!1ses!2sve" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" ></iframe>
<div class="my-5">
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
        <form action="{{ route('send-contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-14">
                    <div class="d-flex">
                        <i class="fas fa-map-marker-alt color-primario d-block me-2 mb-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex">
                        <img src="{{ asset('images/Group_3157.svg') }}" class="me-2 mb-3"><span class="d-block">{{ $data->email }}</span>                        
                    </div>
                    <div class="d-flex">
                        <i class="fas fa-phone-alt color-primario me-2 mb-3"></i>  
                        @php 
                        $telephone1 = Str::of($data->phone1)->explode('|');
                        $telephone2 = Str::of($data->phone2)->explode('|');
                        @endphp         
                        @if (count($telephone1) > 1)
                            <a href="tel:{{$telephone1[0]}}" class="text-decoration-none" style="color: #212529;">{{$telephone1[1]}}</a>
                            <span class="mx-1">/</span> 
                        @endif
                        @if (count($telephone2) > 1)
                            <a href="tel:{{$telephone2[0]}}" class="text-decoration-none" style="color: #212529;">{{ $telephone2[1] }}</a>
                        @endif  
                    </div>
                </div>          
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="nombre" placeholder="Nombre" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="apellido" placeholder="Apellido" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <input type="text" name="empresa" placeholder="Empresa" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="termino" id="termino">
                                <label class="form-check-label font-size-13" for="termino">Acepto los términos y condiciones de privacidad</label>
                              </div>
                            <div class="form-group">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <button type="submit" class="text-uppercase btn text-white bg-red font-size-14 py-3 px-5 rounded-pill font-weight-600 mb-sm-3 mb-md-0 ">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('head')
@endpush
