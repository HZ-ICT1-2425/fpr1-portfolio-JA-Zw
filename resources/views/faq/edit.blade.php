<x-layout xmlns="http://www.w3.org/1999/html">
    <x-slot:description>Pagina om een FAQ te bewerken.</x-slot:description>
    <x-slot:title>Bewerk FAQ</x-slot:title>
    <article>
        <h1>Bewerk een FAQ.</h1>
        @if(key_exists("question", $_GET) || key_exists("answer", $_GET)) <b style="color: red;">Yo, je hebt iets leeggelaten.</b>@endif
        <form action="{{route("faq.update", $faq->id)}}" method="POST">
            @csrf
            @method("PUT")
            <label for="question"><p>Titel: </p></label><input type="text" name="question" value="{{ $request->get("question") ?? $faq->question }}"><br>
            <label for="answer"><p>Inhoud: </p></label><textarea name="answer">{{ $request->get("answer") ?? $faq->answer }}</textarea><br>
            <input type="submit">
            <a href="{{route("faq")}}"><button type="button">ga terug</button></a>
        </form>
    </article>

</x-layout>
