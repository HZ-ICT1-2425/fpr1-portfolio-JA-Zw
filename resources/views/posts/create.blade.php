<x-layout description="Pagina om een blogpost aan te maken." title="Maak blogpost">
    <x-slot:head><x-include-trix /></x-slot:head>
    <article>
        <h1>Maak een blogpost.</h1>
        <form action="{{route("posts.store")}}" method="POST">
            @csrf
            <label for="title"><p>Titel: </p></label><input type="text" name="title" value="{{ old("title") }}">
            @error("title")<p style="color:red;">{{$message}}</p>@enderror
            <label for="body"><p>Inhoud: </p></label><input type="hidden" id="body" name="body" value="{{ old("body") }}"><trix-editor input="body"></trix-editor>
            @error("body")<p style="color:red;">{{$message}}</p>@enderror
            <label for="preview"><p>Preview (excl. puntjes): </p></label><input type="text" name="preview" value="{{ old("preview") }}"><br>
            @error("preview")<p style="color:red;">{{$message}}</p>@enderror
            <input type="submit">
            <a href="{{route("posts.index")}}"><button type="button">ga terug</button></a>
        </form>
    </article>

</x-layout>
