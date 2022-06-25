@extends('adminlte::page')
@section('title','Editar Clientes')
@section('content_header')
@stop
@section('content')
    <div class="card">
        @include('admin.partials.main_header',['action'=>'edit','module_name'=>'documentos','route_add'=>Null])
    <div class="card-body">
        @include('admin.documents.partials.edit',['model'=>$document,'module'=>'documents'])
    </div>
@stop
@section('js')
    @include('includes.sweatAlert_js')
@stop

