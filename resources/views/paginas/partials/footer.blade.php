<div class="pre-footer text-uppercase text-center bg-red p-3">
    <span class="font-size-14 color-white">seguinos en</span>
    <a href="{{$data->facebook}}" class="py-1 px-2 color-white rounded-circle border border-2 border-white mx-2">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a href="{{$data->instagram}}" class="py-1 px-2 color-white rounded-circle border border-2 border-white">
        <i class="fab fa-instagram"></i>
    </a>
</div>
<footer class="py-sm-2 py-md-5 font-size-14 text-sm-center text-md-start fondo-negro-claro">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-1 mb-sm-4 mb-md-0 pt-sm-4 pt-md-0">
                <a href="{{ route('index') }}"><img src="{{asset($data->logo_footer)}}" width="100" class=""></a>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="row justify-content-between">
                    <div class="col-sm-12 d-sm-none d-md-block">    
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="text-uppercase color-primario font-weight-600">secciones</h6>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none text-dark mb-1">Empresa</a>
                                <a href="{{ route('productos') }}" class="d-block text-uppercase text-decoration-none text-dark mb-1">Productos</a>
                                <a href="{{ route('aplicaciones') }}" class="d-block text-uppercase text-decoration-none text-dark mb-1">Aplicaciones</a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <a href="{{ route('cartaDeColores') }}" class="d-block text-uppercase text-decoration-none text-dark mb-1">Carta de colores</a>
                                <a href="{{ route('sulicitudPresupuesto') }}" class="d-block text-uppercase text-decoration-none text-dark mb-1">Presupuesto</a>
                                <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none text-dark mb-1">Contacto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 mb-sm-4 mb-md-0">
                <div class="row">
                    <div class="col-sm-12 newsletter">
                        <h6 class="text-uppercase color-primario font-weight-600">SUSCRIBITE AL NEWSLETTER</h6>
                        <form action="{{ route('newsletter.store') }}" id="formNewsletter">
                            @csrf
                            <div class="">
                                <label class="visually-hidden" for="">Username</label>
                                <div class="input-group font-size-12">
                                    <input type="email" name="email" autocomplete="off" class="form-control font-size-12" placeholder="Ingresa tu email" style="border-radius: 15px 0 0 15px; background-color: #f9f9f9; height:40px;">
                                    <button type="submit" id="" class="input-group-text bg-red" style="border-radius: 0 15px 15px 0;   border: none;"><i class="far fa-paper-plane color-white"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 font-size-13 mb-sm-4 mb-md-0">
                <div class="row">
                    <h6 class="text-uppercase color-primario font-weight-600">contacto</h6>
                    <div class="">
                        <i class="fas fa-map-marker-alt color-primario  me-2 mb-3"></i>
                        <address class=" text-dark m-0 d-inline-block"> {{ $data->address }}</address>
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset('images/Group_3157.svg') }}" class="me-2">
                        <a href="mailto:{{ $data->email }}" class="text-dark text-decoration-none">{{ $data->email }}</a>             
                    </div>
                    <div class="">    
                        <i class="fas fa-phone-alt color-primario me-2 mb-3"></i>  
                        @php 
                        $telephone1 = Str::of($data->phone1)->explode('|');
                        $telephone2 = Str::of($data->phone2)->explode('|');
                        @endphp
                        
                        @if (count($telephone1) > 1)
                            <a href="tel:{{$telephone1[0]}}" class="text-dark text-decoration-none">{{$telephone1[1]}}</a>
                            <span class="mx-1">/</span> 
                        @endif
                        @if (count($telephone2) > 1)
                            <a href="tel:{{$telephone2[0]}}" class="text-dark text-decoration-none">{{ $telephone2[1] }}</a>
                        @endif               
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="bg-dark text-white p-2 font-size-13">
    <div class="container">
        <div class="row">
            <div class="col">
                <span>© Copyright 2021 Mnahmias. Todos los derechos reservados</span>
            </div>
        </div>
    </div>
</div>
@isset($data->phone3)
    <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
        <i class="fab fa-whatsapp"></i>
    </a>     
@endisset