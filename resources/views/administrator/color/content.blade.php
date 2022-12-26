@extends('adminlte::page')
@section('title', 'Colores')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Colores</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Color</th>
                    <th>Orden</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.color.modals.create')
@includeIf('administrator.color.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('color.content')}}">
    <meta name="content_find" content="{{route('color.content.find')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/color/index.js') }}"></script>
@stop

