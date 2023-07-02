
<x-layout>
@foreach ($posts as $post)
{{-- @dd($loop) --}}
<article class="{{$loop->even ? "foo": ""}}">
    <h1>
        <a href="/posts/{{ $post->id; }}">
            {{ $post->title;}}
        </a>
    </h1>

    <div>
        <?= $post->excerpt; ?>
    </div>
</article>
@endforeach
</x-layout>
