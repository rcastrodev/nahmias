@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Pre título</th>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@if ($section2)
<form action="{{ route('home.content.generic-section.update') }}" method="post" enctype="multipart/form-data" class="row mt-5 mb-5">
    <input type="hidden" name="id" value="{{$section2->id}}">
    <div class="col-sm-12">
        <div class="form-group">
            <input type="text" name="content_1" value="{{$section2->content_1}}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <input type="text" name="content_2" value="{{$section2->content_2}}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12">
        <input type="file" name="image" class="form-control-file">
    </div>
    <div class="text-right col-sm-12">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>    
@endif
@includeIf('administrator.home.modals.create')
@includeIf('administrator.home.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
@stop

