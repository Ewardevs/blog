<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre']) !!}

    @error('name')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'ingrese el slug','readonly']) !!}

    @error('slug')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    @error('category_id')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>

    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>    
    @endforeach
    
    @error('tags')
    <br>
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Estado</p>

    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>
    
    
    @error('status')
    <br>
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($post->image)
                
            <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
            @else
            <img id="picture" src="https://cdn.pixabay.com/photo/2015/03/03/17/05/book-657602_1280.jpg" alt="">

            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen') !!}
            {!! Form::file('file', ['class'=>'form-control-file','accept'=>'image/*']) !!}

        </div>
        @error('file')
    <br>
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, magnam voluptates quidem, minima tempore error veniam qui, deserunt rerum ullam soluta delectus laudantium impedit nulla facilis assumenda mollitia iste sapiente?</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'estracto') !!}
    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}

    
    @error('extract')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}

    @error('body')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>