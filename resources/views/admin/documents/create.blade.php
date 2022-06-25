@extends('adminlte::page')
@section('title','Cargar documento')
@section('content_header')
@stop
@section('content')
    <div class="card">


        @include('admin.partials.main_header',['action'=>'create','module_name'=>'documents','route_add'=>Null])


    <div class="card-body">
        @include('admin.documents.partials.create')
    </div>
@stop
@section('js')
    @include('includes.sweatAlert_js')
@stop

