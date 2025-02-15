<x-layout xmlns="http://www.w3.org/1999/html">
    <x-slot:description>Pagina om een blogpost aan te maken.</x-slot:description>
    <x-slot:title>Maak blogpost</x-slot:title>
    <article>
        <h1>Maak een blogpost.</h1>
        @if(key_exists("title", $_GET) || key_exists("body", $_GET) || key_exists("preview", $_GET)) <b style="color: red;">Yo, je hebt iets leeggelaten.</b>@endif
        <form action="{{route("posts.submit")}}" method="POST">
            @csrf
            <label for="title"><p>Titel: </p></label><input type="text" name="title" @if(!empty($request->get("title")))value="{{ $request->get("title") }}"@endif><br>
            <label for="body"><p>Inhoud: </p></label><textarea name="body">@if(!empty($request->get("body"))){{ $request->get("body") }}@endif</textarea><br>
            <label for="preview"><p>Preview (excl. puntjes): </p></label><input type="text" name="preview" @if(!empty($request->get("preview")))value="{{ $request->get("preview") }}"@endif><br>
            <input type="submit">
            <a href="{{route("posts")}}"><button type="button">ga terug</button></a>
        </form>
    </article>

</x-layout>
