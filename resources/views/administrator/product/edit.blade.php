@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary product">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="card-header">Producto</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        <div class="form-group col-sm-12 col-md-8">
            <label for="">Nombre del producto</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{$product->order}}" class="form-control" placeholder="Ej AA">
        </div>
        <div class="form-group col-sm-12 col-md-2 text-center">
            <label class="d-block">Destacado</label>
            <input type="checkbox" name="outstanding" value="1" @if($product->outstanding) checked @endif>
        </div> 
        <div class="form-group col-sm-12">
            <label for="">Presentación</label>
            <textarea name="description" class="form-control ckeditor" cols="30" rows="2">{{$product->description}}</textarea>
        </div>
        <div class="form-group col-sm-12">
            <small>Tamaño de imagen recomendada 310x220</small>
        </div>    
        @foreach ($product->images as $pi)
            <div class="form-group col-sm-12 col-md-4 ">
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product-picture.content.destroy', ['id'=> $pi->id]) }}"></button>
                    <img src="{{ asset($pi->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
                <label>imagen</label>
                <input type="file" name="images[]" class="form-control-file">
            </div>                    
        @endforeach
        @if ($numberOfImagesAllowed)
            @for ($i = 1; $i <= $numberOfImagesAllowed; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image">imagen</label>
                    <input type="file" name="images[]" class="form-control-file" id="">
                </div>           
            @endfor
        @endif   
        <div id="accionamiento" class="form-group col-sm-12 mt-4">
            <label for="">Colores</label>
            <select name="colors[]" class="select2 form-control" multiple="multiple">
                @foreach ($colors as $acc)
                    <option 
                    value="{{$acc->id}}"
                    @if(in_array($acc->id, $product->colors->pluck('id')->toArray(), true)) selected @endif
                    >{{$acc->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12">
            <label for="">Aplicaciones</label>
            <select name="applications[]" class="select2 form-control" multiple="multiple">
                @foreach ($applications as $app)
                    <option 
                    value="{{$app->id}}"
                    @if(in_array($app->id, $product->applications->pluck('id')->toArray(), true)) selected @endif
                    >{{$app->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        let buttonsDestroyImgProduct = document.querySelectorAll('.destroyImgProduct')

        function modalDestroy(e)
        {
            e.preventDefault()

            Swal.fire({
                title: 'Deseas eliminar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    elementDestroy(this)
                }
            })
        }

        function elementDestroy(elemet)
        {
            axios.delete(elemet.dataset.url).then(r => {
                Swal.fire(
                    'Eliminado!',
                    '',
                    'success'
                )
            
                elemet.parentElement.remove()
            }).catch(error => console.error(error))

        }

        buttonsDestroyImgProduct.forEach(buttonDestroyImgProduct => {
            buttonDestroyImgProduct.addEventListener('click', modalDestroy)
        });

        // borrar ficha técnica
        let bf = document.getElementById('borrarFicha')
        if (bf) {
            bf.addEventListener('click', function(e){
                e.preventDefault()
                axios.delete(this.dataset.url)
                .then(r => {
                    this.closest('div').remove()
                })
                .catch(e => console.error( new Error(e) ))      
            })
        } 

    </script>
    <script>
        $('.select2').select2()

        let sl = document.getElementById('category_id')
        
        $(document).ready(function(){
            let accionamiento = document.getElementById('accionamiento')
            let rt = sl.options[sl.selectedIndex].text.toLowerCase()

            if (rt == 'automaticos' || rt == 'manuales'){
                accionamiento.classList.remove('d-none')
                $('.sw').addClass('d-none')
                $('.sw').removeClass('d-block')
            }else{
                accionamiento.classList.add('d-none')
                $('.sw').addClass('d-block')
                $('.sw').removeClass('d-none')
            }   
        })
        
        $(document).on('change', "#category_id", function(){
            let accionamiento = document.getElementById('accionamiento')
            let rt = sl.options[sl.selectedIndex].text.toLowerCase()

            if (rt == 'automaticos' || rt == 'manuales'){
                accionamiento.classList.remove('d-none')
                $('.sw').addClass('d-none')
                $('.sw').removeClass('d-block')
            }else{
                accionamiento.classList.add('d-none')
                $('.sw').addClass('d-block')
                $('.sw').removeClass('d-none')
            }   
        })

    </script>
@stop

