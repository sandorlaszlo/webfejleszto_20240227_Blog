<x-layout>
    <h2>{{ $post->title }}</h2>
    <p>Category: {{ $post->category->name }}</p>
    <p>Published at: {{ $post->published_at }}</p>
    <div>
        {{ $post->body }}
    </div>
</x-layout>
