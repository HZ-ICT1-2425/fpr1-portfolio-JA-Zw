<x-layout>
    <x-slot:description>Een overzicht van blogposts.</x-slot:description>
    <x-slot:title>Blog</x-slot:title>

    <article>
        <h1>Blogposts</h1>
        <a class="knop" href="{{route("posts.create")}}">maak een blogpost</a>
        @if(count($posts) < 1)
        <h2>Er zijn geen FAQs.</h2>
        @else
        <ol>
            @foreach($posts as $post)
                <li><b>{!! $post->title !!} (<a href="/posts/{{$post->slug}}">lees</a>)</b></br>{!! $post->preview !!}...</li>
            @endforeach
        </ol>
        @endif
    </article>
</x-layout>
