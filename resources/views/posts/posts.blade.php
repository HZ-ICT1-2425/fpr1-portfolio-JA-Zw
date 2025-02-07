<x-layout>
    <x-slot:description>Een overzicht van blogposts.</x-slot:description>
    <x-slot:title>Blog</x-slot:title>
    <x-slot:current>posts</x-slot:current>


    <article>
        <h1>Blogposts</h1>
        <ol>
            @foreach($posts as $post)
                <li><b>{{$post["title"]}} (<a href="/posts/{{$post["slug"]}}">lees</a>)</b></br>{{$post["preview"]}}...</li>
            @endforeach
        </ol>
    </article>
</x-layout>
