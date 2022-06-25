@extends('adminlte::page')
@section('title','crear Clientes')
@section('content_header')
@stop
@section('content')
    <div class="card">


        @include('admin.partials.main_header',['action'=>'create','module_name'=>'clientes','route_add'=>Null])


    <div class="card-body">
        @include('admin.customers.partials.create')
    </div>
@stop
@section('js')
    @include('includes.sweatAlert_js')
@stop

