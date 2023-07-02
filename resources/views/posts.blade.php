@extends('layout')

@section('banner')
    <h1>My Blogs</h1>
@endsection

    @section('content')

    @foreach ($posts as $post)
    {{-- @dd($loop) --}}
    <article class="{{$loop->even ? "foo": ""}}">
        <h1>
            <a href="/posts/{{ $post->slug; }}">
                {{ $post->title;}}
            </a>
        </h1>

        <div>
            <?= $post->excerpt; ?>
        </div>
    </article>
    @endforeach

@endsection
