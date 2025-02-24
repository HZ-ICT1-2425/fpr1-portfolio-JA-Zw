<x-layout xmlns="http://www.w3.org/1999/html">
    <x-slot:description>Pagina om een blogpost te bewerken.</x-slot:description>
    <x-slot:title>Bewerk blogpost</x-slot:title>
    <x-slot:head><x-include-trix /></x-slot:head>
    <article>
        <h1>Bewerk een blogpost.</h1>
        @if(session("fout")) <b style="color: red;">Yo, je hebt iets leeggelaten.</b>@endif
        <form action="{{route("posts.update", $post->id)}}" method="POST">
            @csrf
            @method("PUT")
            <label for="title"><p>Titel: </p></label><input type="text" name="title" value="{{ old("title") ?? $post->title }}"><br>
            <!--<label for="body"><p>Inhoud: </p></label><textarea name="body"></textarea><br>-->

            <label for="body"><p>Inhoud: </p></label><input type="hidden" id="body" name="body" value="{{ old("body") ?? $post->body }}"><trix-editor input="body"></trix-editor><br>

            <label for="preview"><p>Preview (excl. puntjes): </p></label><input type="text" name="preview" value="{{ old("preview") ?? $post->preview }}"><br>
            <input type="submit">
            <a href="{{route("posts.show", $post->slug)}}"><button type="button">ga terug</button></a>
        </form>
    </article>

</x-layout>
