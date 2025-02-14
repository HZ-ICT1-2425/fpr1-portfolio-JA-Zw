<x-layout xmlns="http://www.w3.org/1999/html">
    <x-slot:description>Pagina om een FAQ aan te maken.</x-slot:description>
    <x-slot:title>Maak FAQ</x-slot:title>
    <article>
        <h1>Maak een FAQ.</h1>
        @if(key_exists("question", $_GET) || key_exists("answer", $_GET)) <b style="color: red;">Yo, je hebt iets leeggelaten.</b>@endif
        <form action="{{route("faq.submit")}}" method="POST">
            @csrf
            <label for="question"><p>Titel: </p></label><input type="text" name="question" @if(!empty($request->get("question")))value="{{ $request->get("question") }}"@endif><br>
            <label for="answer"><p>Inhoud: </p></label><textarea name="answer">@if(!empty($request->get("answer"))){{ $request->get("answer") }}"@endif</textarea><br>
            <input type="submit">
            <a href="{{route("faq")}}"><button type="button">ga terug</button></a>
        </form>
    </article>

</x-layout>
