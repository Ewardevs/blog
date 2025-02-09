<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-700">
            {{ $post->name }}
        </h1>

        <div class="text-lg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenmido principal --}}
            <div class="lg:col-span-2">
                @if ($post->image)
                    <figure>
                        <img class="w-ful h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}"
                            alt="" srcset="">
                    </figure>
                @else
                    <figure>
                        <img class="w-full h-80 object-cover object-center"
                            src="https://cdn.pixabay.com/photo/2014/09/25/10/09/full-moon-460314_1280.jpg"
                            alt="" srcset="">
                    </figure>
                @endif

                <div class="text-base text-gray-500 mt-4">
                    {!! $post->body !!}
                </div>
            </div>

            <aside class="">
                <h1 class="text-2xl font-bold text-gray-600 mb-4">
                    Mas en {{ $post->category->name }}
                </h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $similar) }}">
                                @if ($similar->image)
                                    <img style="width: 100px; height: 80px;"
                                        class=" object-cover object-center fix-img"
                                        src="{{ Storage::url($similar->image->url) }}" alt="">
                                @else
                                    <img class="w-40 h-20 object-cover object-center"
                                        src="https://cdn.pixabay.com/photo/2014/09/25/10/09/full-moon-460314_1280.jpg"
                                        alt="">
                                @endif
                                <span class="ml-2 text-gray-600">
                                    {{ $similar->name }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
