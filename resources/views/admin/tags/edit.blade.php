@extends('adminlte::page')

@section('title', 'Codersfree')

@section('content_header')
    <h1>Editar etiqueta</h1>
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
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}

            @include('admin.tags.partials.form')

            {!! Form::submit('Actualizar etiqueta', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
    


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var inputName = document.getElementById('name');
            var inputSlug = document.getElementById('slug');

            inputName.addEventListener('input', function() {
                var text = inputName.value;

                // Normalize and remove diacritics
                var normalizedText = text.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
                
                var slug = normalizedText
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '') // Eliminar caracteres especiales
                    .replace(/\s+/g, '-')        // Reemplazar espacios con guiones
                    .replace(/-+/g, '-');        // Reemplazar múltiples guiones con uno solo

                inputSlug.value = slug;
            });
        });
    </script>

@endsection

