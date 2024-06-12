<div class="card">
    
    <div class="card-header">
        <div class="input-group">
            <input wire:model.live="search" class="form-control" type="text" placeholder="Ingrese el nombre del post">
            <div class="input-group-append">
                <a class="btn btn-secondary btn-sm" href="{{route('admin.posts.create')}}" style="margin-left: 10px;">
                    Crear post
                </a>
            </div>
        </div>
    </div>
    
    

    @if ($posts->count())
        
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td colspan="2"></td>
                </tr>

            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit',$post)}}">
                                Editar
                            </a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.posts.destroy',$post)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>

        </table>
    </div>
    <div class="card-footer float-left">
        {{$posts->links()}}
    </div>
    @else
    <div class="card-body">

        <strong>
            No hay ningun registro...
        </strong>
    </div>
    @endif
    
</div>
