<x-layout xmlns="http://www.w3.org/1999/html">
    <x-slot:description>Pagina om een FAQ aan te maken.</x-slot:description>
    <x-slot:title>Maak FAQ</x-slot:title>
    <x-slot:head><x-include-trix /></x-slot:head>
    <article>
        <h1>Maak een FAQ.</h1>
        @if(session("fout")) <b style="color: red;">Yo, je hebt iets leeggelaten.</b>@endif
        <form action="{{route("faq.store")}}" method="POST">
            @csrf
            <label for="question"><p>Titel: </p></label><input type="text" name="question" value="{{ old("question") }}"><br>
            <!--<label for="answer"><p>Inhoud: </p></label><textarea name="answer">{{ old("answer") }}</textarea><br>-->
            <label for="answer"><p>Inhoud: </p></label><input type="hidden" id="answer" name="answer" value="{{ old("answer") }}"><trix-editor input="answer"></trix-editor><br>
            <input type="submit">
            <a href="{{route("faq.index")}}"><button type="button">ga terug</button></a>
        </form>
    </article>

</x-layout>
