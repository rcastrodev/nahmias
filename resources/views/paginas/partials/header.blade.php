<header class="header bg-red py-2 d-sm-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-7 col-xxl-6 d-flex justify-content-between align-items-center flex-wrap text-white">
                <span class="mb-xs-2 mb-md-0 text-white">
                    <img src="{{ asset('images/Path_2572.svg') }}" class="me-2">{{ $data->address }}
                </span>
                <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-white text-decoration-none">
                    <img src="{{ asset('images/Group_1364.svg') }}" class="me-2"> {{ $data->email }}
                </a>
                <span class="mb-xs-2 mb-md-0">
                    <img src="{{ asset('images/Path_2573.svg') }}" class="me-2"> 
                    @php 
                        $telephone1 = Str::of($data->phone1)->explode('|');
                        $telephone2 = Str::of($data->phone2)->explode('|');
                    @endphp
                    @if (count($telephone1) > 1)
                        <a href="tel:{{$telephone1[0]}}" class="text-white text-decoration-none">{{$telephone1[1]}}</a>
                        <span class="mx-1">|</span> 
                        <a href="tel:{{$telephone2[0]}}" class="text-white">{{$telephone2[1]}}</a>
                    @else
                        <a href="tel:{{$data->phone1}}" class="text-white">{{$data->phone1}}</a>
                        <span class="mx-1">|</span> 
                        <a href="tel:{{$data->phone2}}" class="text-white">{{$data->phone2}}</a>
                    @endif
                </span>  
            </div>
            <div class="col-sm-12 col-md-5 col-xxl-6 d-flex justify-content-end align-items-center ">
                <span class="mx-1 text-white">|</span> 
                <a href="{{$data->facebook}}" class="px-1" target="_blank"><i class="fab fa-facebook-f text-white"></i></a>
                <a href="{{$data->instagram}}" class="px-1" target="_blank"><i class="fab fa-instagram text-white"></i></a>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" width="314" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-uppercase" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item @if(Request::is('/')) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('/')) active @endif" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item @if(Request::is('productos') || Request::is('producto/*') ) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('productos') || Request::is('producto/*')) active @endif" href="{{ route('productos') }}">Productos</a>
                </li>
                <li class="nav-item @if(Request::is('aplicaciones')) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('aplicaciones')) active @endif" href="{{ route('aplicaciones') }}">Aplicaciones</a>
                </li>
                <li class="nav-item @if(Request::is('carta-de-colores')) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('carta-de-colores')) active @endif" href="{{ route('cartaDeColores') }}">Carta de colores</a>
                </li>
                <li class="nav-item @if(Request::is('sulicitud-de-presupuesto')) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('sulicitud-de-presupuesto')) active @endif" href="{{ route('sulicitudPresupuesto') }}" >Solicitud de presupuesto</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
