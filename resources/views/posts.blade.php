<x-layout>
    @foreach ($posts as $post)
        <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
        <p><b>Category: <a href="/categories/{{ $post->category_id }}">{{ $post->category->name }}</a></b></p>
        <p><b>Author: <a href="/authors/{{ $post->user_id }}">{{ $post->author->name }}</a></b></p>
        <p>{{ $post->lead }}</p>
    @endforeach
</x-layout>