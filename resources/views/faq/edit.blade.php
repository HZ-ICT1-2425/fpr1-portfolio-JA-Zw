<x-layout xmlns="http://www.w3.org/1999/html">
    <x-slot:description>Pagina om een FAQ te bewerken.</x-slot:description>
    <x-slot:title>Bewerk FAQ</x-slot:title>
    <x-slot:head><x-include-trix /></x-slot:head>
    <article>
        <h1>Bewerk een FAQ.</h1>
        @if(session("fout")) <b style="color: red;">Yo, je hebt iets leeggelaten.</b>@endif
        <form action="{{route("faq.update", $faq->id)}}" method="POST">
            @csrf
            @method("PUT")
            <label for="question"><p>Titel: </p></label><input type="text" name="question" value="{{ old("question") ?? $faq->question }}"><br>
            <!--<label for="answer"><p>Inhoud: </p></label><textarea name="answer">{{ old("answer") ?? $faq->answer }}</textarea><br>-->
            <label for="answer"><p>Inhoud: </p></label><input type="hidden" id="answer" name="answer" value="{{ old("answer") ?? $faq->answer }}"><trix-editor input="answer"></trix-editor><br>

            <input type="submit">
            <a href="{{route("faq.index")}}"><button type="button">ga terug</button></a>
        </form>
    </article>

</x-layout>
