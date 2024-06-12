<x-app-layout>
    <input  class="bg-red-500 bg-green-500 bg-yellow-500 bg-blue-500 bg-indigo-500 bg-purple-500 bg-pink-500" type="hidden">
    <div class="container py-8 ">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center {{ $loop->first ? 'md:col-span-2' : '' }}" style="background-image: url(@if($post->image) {{ Storage::url($post->image->url) }} @else 'https://cdn.pixabay.com/photo/2014/09/25/10/09/full-moon-460314_1280.jpg' @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div class="mb-4">
                            @foreach ($post->tags as $tag)
                                <a href="{{route('posts.tag',$tag)}}" class="inline-block px-3 h-6 bg-{{ $tag->color }}-500 text-white rounded-full">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl mt-2 text-white leading-8 font-bold">
                            <a href="{{route('posts.show',$post)}}">
                                {{ $post->name }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="my-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
