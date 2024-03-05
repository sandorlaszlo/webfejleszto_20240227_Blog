<x-layout>
    <h1>Categories</h1>
    {{-- @dd($categories) --}}

    <ul>
        @foreach ($categories as $category)
            <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>

</x-layout>