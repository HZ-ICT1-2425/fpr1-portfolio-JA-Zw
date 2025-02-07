<x-layout>
    <x-slot:description>{{$post["description"]}}</x-slot:description>
    <x-slot:title>{{$post["title"]}}</x-slot:title>
    <x-slot:current>posts</x-slot:current>

    <article>
        <h1>{{$post["title"]}}</h1>
        {!! $post["contents"] !!}
    </article>
</x-layout>
