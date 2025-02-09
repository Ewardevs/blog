@extends('adminlte::page')

@section('title', 'Codersfree')

@section('content_header')
    <h1>Lista de Categorias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">

            <strong>
                {{ session('info') }}
            </strong>
        </div>
    @endif

    <div class="card">
        @can('admin.categories.create')
            <div class="card-header">
                <a class="btn btn-secondary" href="{{ route('admin.categories.create') }}">
                    Agregar Categoria
                </a>
            </div>
        @endcan
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                @can('admin.categories.edit')
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.categories.destroy')
                                    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
