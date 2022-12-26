@extends('adminlte::page')
@section('title', 'Crear producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<div class="card card-primary">
    <div class="card-header"></div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('product.content.store') }}" method="post" enctype="multipart/form-data">
        <div class="card-body row product">
            @csrf
            <div class="form-group col-sm-12 col-md-8">
                <label for="">Nombre del producto</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del producto">
            </div>  
            <div class="form-group col-sm-12 col-md-2">
                <label for="">Orden</label>
                <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="Ej AA">
            </div> 
            <div class="form-group col-sm-12 col-md-2 text-center">
                <label class="d-block">Destacado</label>
                <input type="checkbox" name="outstanding" value="1">
            </div> 
            <div class="form-group col-sm-12">
                <label for="">Presentación</label>
                <textarea name="description" class="form-control ckeditor" cols="30" rows="5">{{old('description')}}</textarea>
            </div>      
            <div class="form-group col-sm-12">
                <small>Tamaño de imagen recomendada 310x220</small>
            </div>    
            @for ($i = 1; $i <= 6; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image{{$i}}">imagen {{$i}}</label>
                    <input type="file" name="images[]" class="form-control-file" id="image{{$i}}">
                </div>           
            @endfor
            <div class="form-group col-sm-12 mt-4">
                <label for="">Colores</label>
                <select name="colors[]" class="select2 form-control" multiple="multiple">
                    @foreach ($colors as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12 mt-4">
                <label for="">Aplicaciones</label>
                <select name="applications[]" class="select2 form-control" multiple="multiple">
                    @foreach ($applications as $app)
                        <option value="{{$app->id}}">{{$app->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>        
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
@stop

