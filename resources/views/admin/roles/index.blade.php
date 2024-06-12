@extends('adminlte::page')

@section('title', 'Codersfree')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary" href="{{ route('admin.roles.create') }}">
                Agregar Role
            </a>
        </div>
        <div class='card-body'>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</th>
                            <td>{{ $role->name }}</th>
                            <td width="10px">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.roles.edit', $role) }}">
                                    Editar
                                </a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.roles.destroy', $role) }}" method='post'>

                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-sm btn-primary" type="submit">
                                        Eliminar
                                    </button>
                                </form>
                                </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
