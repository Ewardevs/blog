@extends('adminlte::page')

@section('title', 'Codersfree')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}

           @include('admin.roles.partials.form')

            {!! Form::submit('Crear rol', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
