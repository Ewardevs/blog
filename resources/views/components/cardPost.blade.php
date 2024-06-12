@props(["post"])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($post->image)
    <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
    @else
    <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2014/09/25/10/09/full-moon-460314_1280.jpg" alt="">
    @endif
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show',$post)}}">
                {{$post->name}}
            </a>
        </h1>
        <div class="text-gray-700 text-base">
            {!!$post->extract!!}
        </div>
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <a class="inline-block mr-2 px-3 py-1 text-sm text-gray-700 bg-gray-200 rounded-full" href="{{route('posts.tag',$tag)}}">{{$tag->name}}</a>
        @endforeach
    </div>
</article>