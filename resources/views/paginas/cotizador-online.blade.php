@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13 mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class=" text-decoration-none font-weight-600" style="color: black;">Inicio</a>
                </li>
                <li class="breadcrumb-item active color-link-gris" aria-current="page">Cotizador Online</li>
            </ol>
        </nav>  
    </div>
</div>
<form action="{{ route('send-quote') }}" method="post" id="cotizadorOnline" enctype="multipart/form-data" class="py-sm-2 py-md-5" style="color: #666666;">
    @csrf
    <div class="container p-sm-2 py-md-5 px-md-3 position-relative" style="background: #F2F2F286 0% 0% no-repeat padding-box; border: 1px solid #666666;">
        <div id="seccion1" class="d-block seccion">
            <div class="row mb-4 boder-before">
                <div class="col-sm-12">
                    <div class="d-flex flex-wrap justify-content-between mb-5">
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-center align-items-center me-3" style="max-height: 30px; min-height: 30px; min-width: 30px; border-radius: 100%; background-color: #FD0D1B;">
                                <i class="fas fa-align-justify text-white"></i>
                            </div>
                            <h4 class="color-primario font-size-18 m-0">Paso 1 - Modelo</h4>
                        </div>
                        <div class="">
                            @isset($s1)
                                <div class="fw-bold tooltipp mt-sm-3 mt-md-0">
                                    <span class="btn btn-sm text-white" style="background-color: #FD0D1B;">{{ $s1->content_1 }}</span>
                                    @if ($s1->image)
                                    <div class="tooltipp-box bg-white p-3">
                                        <img src="{{ asset($s1->image) }}" width="280" height="175">
                                    </div>     
                                    @endif
                                </div>             
                            @endisset

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="ms-sm-0 ms-md-5">
                        <h6 class="color-primario font-size-14 roboto fw-bold">Modelo</h6>
                        <ul class="p-0" style="list-style:none;">
                            @isset($s2)
                                @foreach ($s2 as $label)
                                    <li class="tooltipp-label">
                                        <input type="radio" name="modelo" value="{{$label->content_1}}" class="me-2">
                                        <label class="font-size-14">{{$label->content_1}}</label>
                                        @if ($label->image)
                                            <div class="tooltipp-label-box bg-white p-3">
                                                <img src="{{ asset($label->image) }}" width="115" height="115">
                                            </div>              
                                        @endif
                                    </li>             
                                @endforeach                      
                            @endisset
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 mt-sm-0">
                    <div class="contentDuplicate">
                        <div class="d-flex flex-wrap align-items-center justify-content-between medidas duplicate">
                            <div class="form-group mb-sm-1 mb-md-0">
                                <label for="" class="color-primario font-size-14 fw-bold d-sm-none d-md-block">Cantidad</label>
                                <input type="number" name="data[0][cantidad]" min="1" placeholder="Cantidad" value="" class="form-control cantidad">
                            </div>
                            <div class="form-group mb-sm-1 mb-md-0">
                                <label for="" class="color-primario font-size-14 fw-bold d-sm-none d-md-block">Medidas (Indicar en metros)</label>
                                <input type="number" name="data[0][medida1]" min="1" value="" placeholder="Ancho en metros" class="form-control medida1">
                            </div>
                            <div class="form-group ">
                                <label for="" class="d-sm-none d-md-block" style="visibility: hidden;">Medidas (Indicar en metros)</label>
                                <input type="number" name="data[0][medida2]" min="1" value="" placeholder="Alto en metros" class="form-control medida2">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btnDuplicate d-block ms-auto text-end font-size-14 mt-3">+ Agregar otra cortina</button>
                </div>
            </div>
            <hr style="border-top: 1px solid #707070; opacity: 0.3;">
            <div class="text-end py-3">
                <button type="button" id="btnSiguienteSeccion1" data-mover="seccion2" class="btn move text-uppercase ficha-tecnica rounded-pill font-weight-600 font-size-14">siguiente</button>
            </div>
        </div>
        <div id="seccion2" class="d-none seccion">
            <div class="row mb-4 boder-before">
                <div class="col-sm-12 col-md-3">
                    <div class="d-flex align-items-center mb-5">
                        <div class="d-flex justify-content-center align-items-center me-3" style="max-height: 30px; min-height: 30px; min-width: 30px; border-radius: 100%; background-color: #FD0D1B;">
                            <i class="fas fa-align-justify text-white"></i>
                        </div>
                        <h4 class="color-primario font-size-18 m-0">Paso 2 - Características</h4>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-sm-12 col-md-2">
                    <div class="ms-md-5">
                        <h6 class="color-primario font-size-14 roboto fw-bold">Mecanismo</h6>
                        <ul id="mecanismo" class="p-0 flex-wrap justify-content-sm-between justify-content-md-start" style="list-style: none;">
                            <li><input type="radio" name="mecanismo" value="Manual" class="me-2"><label class="font-size-14">Manual</label></li>
                            <li><input type="radio" name="mecanismo" value="Eléctrica" id="electrica" class="me-2"><label class="font-size-14">Eléctrica</label></li>
                        </ul>
                    </div>
                </div>
                <div id="control_remoto" class="col-sm-12 col-md-2 d-none">
                    <h6 class="color-primario font-size-14 roboto fw-bold">Control Remoto</h6>
                    <ul class="p-0 flex-wrap justify-content-sm-between justify-content-md-start" style="list-style: none;">
                        <li><input type="radio" name="control_remoto" value="si" class="me-2"><label class="font-size-14">Si</label></li>
                        <li><input type="radio" name="control_remoto" value="no" class="me-2"><label class="font-size-14">No</label></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-2">
                    <h6 class="color-primario font-size-14 roboto fw-bold">Puerta de escape</h6>
                    <ul id="puertaEscape" class="p-0 flex-wrap justify-content-sm-between justify-content-md-start" style="list-style: none;">
                        <li><input type="radio" name="puerta_escape" value="si" id="puertaChecked" class="me-2"><label class="font-size-14">Si</label></li>
                        <li><input type="radio" name="puerta_escape" value="no" class="me-2"><label class="font-size-14">No</label></li>
                    </ul>
                </div>
                <div id="colocacion" class="col-sm-12 col-md-2">
                    <h6 class="color-primario font-size-14 roboto fw-bold">Colocación</h6>
                    <ul class="p-0 flex-wrap justify-content-sm-between justify-content-md-start" style="list-style: none;">
                        <li><input type="radio" name="colocacion" id="puerta" value="si" class="me-2"><label class="font-size-14">Si</label></li>
                        <li><input type="radio" name="colocacion" value="no"  class="me-2"><label class="font-size-14">No</label></li>
                    </ul>
                </div>
            </div>
            <hr style="border-top: 1px solid #707070; opacity: 0.3;">
            <div class="d-flex justify-content-between py-3">
                <button type="button" id="btnAnteriorSeccion2" data-mover="seccion1" class="btn back text-uppercase ficha-tecnica rounded-pill font-weight-600 font-size-14">Anterior</button>
                <button type="button" id="btnSiguienteSeccion2" data-mover="seccion3" class="btn move text-uppercase ficha-tecnica rounded-pill font-weight-600 font-size-14">siguiente</button>
            </div>
        </div>
        <div id="seccion3" class="d-none seccion">
            <div class="row align-items-center mb-4 boder-before">
                <div class="col-sm-12 col-md-3">
                    <div class="d-flex align-items-center mb-5">
                        <div class="d-flex justify-content-center align-items-center me-3" style="max-height: 30px; min-height: 30px; min-width: 30px; border-radius: 100%; background-color: #FD0D1B;">
                            <i class="fas fa-align-justify text-white"></i>
                        </div>
                        <h4 class="color-primario font-size-18 m-0">Paso 3 - Datos personales</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Ingresar el nombre *">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Ingrese su correo electrónico *">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Ingrese su teléfono *">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3 d-none" id="localidad">
                    <div class="form-group">
                        <input type="text" name="location" class="form-control" placeholder="Localidad de colocación*">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <textarea name="message" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-sm-3 mb-md-5 position-relative">
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
            <hr style="border-top: 1px solid #707070; opacity: 0.3;">
            <div class="d-flex justify-content-between py-3">
                <button type="button" id="btnAnteriorSeccion3" data-mover="seccion2" class="btn back text-uppercase ficha-tecnica rounded-pill font-weight-600 font-size-14">Anterior</button>
                <button type="submit" class="btn text-uppercase text-white ficha-tecnica rounded-pill font-weight-600 font-size-14 fondo-primario">Enviar</button>
            </div>
        </div>
    </div>
</form>
@endsection
@push('head')
	<meta name="keywords" content="{{$page->keywords}}">
@endpush
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/quote.js') }}"></script>
@endpush