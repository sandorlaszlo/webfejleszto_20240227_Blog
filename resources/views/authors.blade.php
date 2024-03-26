<x-layout>
    <h1>Authors</h1>
    <ul>
        @foreach($authors as $author)
            <li><a href="/authors/{{ $author->id }}">{{ $author->name }}</a></li>
        @endforeach
    </ul>
</x-layout>