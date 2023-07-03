
<x-layout>
@foreach ($posts as $post)
{{-- @dd($loop) --}}
<article class="{{$loop->even ? "foo": ""}}">
    <h1>
        <a href="/posts/{{ $post->slug; }}">
            {{ $post->title;}}
        </a>
    </h1>
    <p>
        <a href="category/{{$post->category->id}}">
            {{ $post->category->title; }}
        </a>
    </p>
    <div>
        <?= $post->excerpt; ?>
    </div>
</article>
@endforeach
</x-layout>
