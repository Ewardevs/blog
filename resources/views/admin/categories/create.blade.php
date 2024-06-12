@extends('adminlte::page')

@section('title', 'Codersfree')

@section('content_header')
    <h1>Crear</h1>
@stop

@section('content')

@if (session('info'))
    <strong>
        {{session('info')}}
    </strong>
@endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre', []) !!}
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la categoria']) !!}
                
                </div>


                <div class="form-group">
                    {!! Form::label('slug', 'Slug', []) !!}
                    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la Slug','readonly']) !!}
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
            
                {!! Form::submit('Crear categoria', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
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
