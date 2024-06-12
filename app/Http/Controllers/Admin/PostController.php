<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy', 'update');
    }
    public function index()
    {
        return view("admin.posts.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view("admin.posts.create", compact("categories", "tags"));
    }


    public function store(PostRequest $request)
    {

        Cache::flush();

        $post = Post::create($request->all());

        if ($request->file('file')) {
            $url = $request->file('file')->store('posts', 'public');
            $post->image()->create([
                'url' => $url
            ]);
        }

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route("admin.posts.edit", $post);
    }




    public function edit(Post $post)
    {

        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view("admin.posts.edit", compact("post", 'categories', 'tags'));
    }



    public function update(PostRequest $request, Post $post)
    {



        $this->authorize('author', $post);

        $post->update($request->all());

        // Comprueba si hay un archivo de imagen en la solicitud
        if ($request->file('file')) {
            // Si el post ya tiene una imagen, elimínala
            if ($post->image) {
                Storage::disk('public')->delete($post->image->url);
                $post->image()->delete();
            }

            // Almacena la nueva imagen
            $url = $request->file('file')->store('posts', 'public');

            // Crea una nueva entrada en la tabla de imágenes
            $post->image()->create([
                'url' => $url
            ]);
        }
        if ($request->tags) {

            $post->tags()->sync($request->tags);
        }
        Cache::flush();
        return redirect()->route('admin.posts.edit', $post)->with('info', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $this->authorize('author', $post);
        $post->delete();

        Cache::flush();
        return redirect()->route('admin.posts.index')->with('info', 'Post eliminado');
    }
}
