<x-layout description="Pagina om een blogpost te bewerken." title="Bewerk blogpost" >
    <x-slot:head><x-include-trix /></x-slot:head>
    <article>
        <h1>Bewerk een blogpost.</h1>
        <form action="{{route("posts.update", $post->id)}}" method="POST">
            @csrf
            @method("PUT")
            <label for="title"><p>Titel: </p></label><input type="text" name="title" value="{{ old("title", $post->title) }}"><br>
            @error("title")<p style="color:red;">{{$message}}</p>@enderror

            <label for="body"><p>Inhoud: </p></label><input type="hidden" id="body" name="body" value="{{ old("body", $post->body) }}"><trix-editor input="body"></trix-editor><br>
            @error("body")<p style="color:red;">{{$message}}</p>@enderror

            <label for="preview"><p>Preview (excl. puntjes): </p></label><input type="text" name="preview" value="{{ old("preview", $post->preview) }}"><br>
            @error("preview")<p style="color:red;">{{$message}}</p>@enderror
            <input type="submit">
            <a href="{{route("posts.show", $post->slug)}}"><button type="button">ga terug</button></a>
        </form>
    </article>

</x-layout>
