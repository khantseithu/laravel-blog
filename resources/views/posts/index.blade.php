
<x-layout>
        @include('posts._hero')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <x-article-grid :posts="$posts" />
        </main>
</x-layout>
