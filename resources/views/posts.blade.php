
<x-layout>
        @include('_hero')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <x-article-grid :posts="$posts" />
        </main>
{{-- @foreach ($posts as $post) --}}
{{-- @dd($loop) --}}
{{-- <article class="{{$loop->even ? "foo": ""}}">
    <h1>
        <a href="/posts/{{ $post->slug; }}">
            {{ $post->title;}}
        </a>
    </h1>
    <p>
        <a href="/category/{{$post->category->slug}}">
            {{ $post->category->title; }}
        </a>
    </p>

     <p>
        By <a href="/author/{{$post->author->username}}">{{ $post->author->name }}</a> in
        <a href="/category/{{$post->category->slug}}">
            {{ $post->category->title; }}
        </a>
    </p>
    <div>
        <?= $post->excerpt; ?>
    </div>
</article> --}}
{{-- @endforeach --}}
</x-layout>
