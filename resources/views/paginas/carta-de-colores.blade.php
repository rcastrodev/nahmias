@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class=" text-decoration-none font-weight-600" style="color: black;">Inicio</a>
                </li>
                <li class="breadcrumb-item active color-link-gris" aria-current="page">Carta de colores</li>                
            </ol>
        </nav>  
    </div>
</div>
@isset($colors)
    <div class="my-5">
        <div class="container">
            <div class="row" id="containerColor">
                @if(count($colors))
                    @foreach ($colors as $color)
                        <div class="col-sm-6 col-md-2 mb-sm-2 mb-md-4">
                            <div class="color" style="height: 58px;">
                                <img src="{{ asset($color->color) }}" style="height: 58px; object-fit:cover" class="img-fluid d-block mx-auto w-100">
                            </div>
                            <div class="card">
                                <div class="card-body ps-0">
                                    <p class="card-text text-truncate"><strong>{{$color->code}}</strong> | {{$color->name}}</p>
                                </div> 
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        @if(count($colors) > 24)
            <div class="text-center">
                <button id="masColores" data-url="{{ route('index') }}" class="btn bg-red text-white fw-bold py-3 px-5 text-uppercase rounded-pill font-size-14">cargar más colores</button>
            </div>
        @endif
    </div>
@endisset
@endsection
@push('head')
@endpush
@push('scripts')
    <script src="js/axios.js"></script>
    <script>
        let btn = document.getElementById('masColores')
        if (btn) {
            btn.addEventListener('click', function(e){
            e.preventDefault()
            let btn = e.currentTarget
            let contenedor = document.getElementById('containerColor')
            
            btn.innerHTML = `Cargando <img src="${btn.dataset.url}/images/loading.gif" width="25">` 
            axios.get(`${btn.dataset.url}/obtener/carta-de-colores`)
                .then(response => {
                    let html = response.data.colores.map( element => {
                        return `<div class="col-sm-6 col-md-2 mb-sm-2 mb-md-4">
                            <div class="color" style="height: 58px;">
                                <img src="{{ asset('${element.color}') }}" style="height: 58px; object-fit:cover" class="img-fluid d-block mx-auto w-100">
                            </div>
                            <div class="card">
                                <div class="card-body ps-0">
                                    <p class="card-text text-truncate"><strong>${element.code}</strong> | ${element.name}</p>
                                </div> 
                            </div>
                        </div>`
                    })

                    setTimeout(() => {
                        contenedor.innerHTML = html.join('')
                        btn.classList.add('d-none')
                    }, 3000);
                })
                .catch(error => console.error(error))
            })      
        }

    </script>
@endpush





