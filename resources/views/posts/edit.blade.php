<x-layout xmlns="http://www.w3.org/1999/html">
    <x-slot:description>Pagina om een blogpost te bewerken.</x-slot:description>
    <x-slot:title>Bewerk blogpost</x-slot:title>
    <article>
        <h1>Bewerk een blogpost.</h1>
        @if(key_exists("title", $_GET) || key_exists("body", $_GET) || key_exists("preview", $_GET)) <b style="color: red;">Yo, je hebt iets leeggelaten.</b>@endif
        <form action="{{route("posts.update", $post->id)}}" method="POST">
            @csrf
            @method("PUT")
            <label for="title"><p>Titel: </p></label><input type="text" name="title" value="{!! $request->get("title") ?? $post->title !!}"><br>
            <label for="body"><p>Inhoud: </p></label><textarea name="body">{!! $request->get("body") ?? $post->body !!}</textarea><br>
            <label for="preview"><p>Preview (excl. puntjes): </p></label><input type="text" name="preview" value="{!! $request->get("preview") ?? $post->preview !!}"><br>
            <input type="submit">
            <a href="{{route("post", $post->id)}}"><button type="button">ga terug</button></a>
        </form>
    </article>

</x-layout>
