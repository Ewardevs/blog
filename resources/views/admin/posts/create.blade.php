@extends('adminlte::page')

@section('title', 'Codersfree')

@section('content_header')
    <h1>crear nuevo post</h1>
   
@stop

@section('content')
    
    <div class="card">

        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            @error('user_id')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror


            @include('admin.posts.partials.form')
            {!! Form::submit('crear post', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;

        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('js')

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>

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
                    .replace(/\s+/g, '-') // Reemplazar espacios con guiones
                    .replace(/-+/g, '-'); // Reemplazar múltiples guiones con uno solo

                inputSlug.value = slug;
            });
        });
    </script>

@endsection
