@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class=" text-decoration-none font-weight-600" style="color: black;">Inicio</a>
                </li>
                <li class="breadcrumb-item active color-link-gris" aria-current="page">Aplicaciones</li>                
            </ol>
        </nav>  
    </div>
</div>
<div class="my-5">
    <div class="container">
        <div class="row">
            @foreach ($applications as $application)
                <div class="col-sm-12 col-md-4 mb-sm-2 mb-md-5">
                    <div class="card" style="background-image: url({{ $application->image }}); min-height: 242px; max-height: 242px;
                        background-blend-mode: overlay; background-color: #ff000042; background-size: 100% 100%; background-repeat: no-repeat; display: flex; justify-content: center; align-items: center;">
                        <h2 class="text-white">{{ $application->name }}</h2>
                    </div> 
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@push('head')
@endpush
@push('scripts')
@endpush





