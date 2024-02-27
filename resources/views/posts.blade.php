<x-layout>
    @foreach ($posts as $post)
        <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
        <p>{{ $post->lead }}</p>
    @endforeach
</x-layout>