@props(['posts'])

@if ($posts->count())

            <x-article-feature :post="$posts[0]"/>

            @if ($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-6">

                    @foreach ($posts->skip(1) as $post)

                    <x-article :post="$post" class="{{$loop->iteration < 3 ? 'col-span-3': 'col-span-2'}}"/>
                    @endforeach
                </div>
            @endif

            @else
                <p class="text-center">No posts yet. Please check back later.</p>
            @endif
