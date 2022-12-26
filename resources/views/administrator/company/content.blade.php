@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de empresa</h1>
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
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<form action="{{ route('company.content.updateInfo') }}" method="post" class="row mt-5 mb-5" data-sync="no">
    @csrf
    <input type="hidden" name="id" value="{{$section_2->id}}">
    <div class="col-sm-12">
        <div class="form-group">
            <input type="text" name="content_1" value="{{$section_2->content_1}}" placeholder="Título" class="form-control">
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <textarea name="content_2" id="content_2" class="form-control ckeditor" cols="30" rows="4">{{$section_2->content_2}}</textarea>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label for="">Video de empresa</label>
            <input type="text" name="content_3" value="{{$section_2->content_3}}" class="form-control">
        </div>
    </div>
    <div class="text-right col-sm-12">
        <button type="submit" class="btn btn-primary update">Actualizar</button>
    </div>
</form>
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script>
        let btnUpdate = document.querySelector('.update')
        let content2 = document.getElementById('content_2')
        let content3 = document.getElementById('content_3')

        btnUpdate.addEventListener('click', function(){
            content2.innerHTML = CKEDITOR.instances['content_2'].getData()
            content3.innerHTML = CKEDITOR.instances['content_3'].getData()
        })
    </script>
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
@stop

