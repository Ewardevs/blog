@extends('adminlte::page')

@section('title', 'Codersfree')

@section('content_header')

    <h1>listado de posts</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">

            <strong>
                {{ session('info') }}
            </strong>
        </div>
    @endif
    @livewire('admin.post-index')
@stop
