<x-layout xmlns="http://www.w3.org/1999/html">
    <x-slot:description>Pagina om een FAQ aan te maken.</x-slot:description>
    <x-slot:title>Maak FAQ</x-slot:title>
    <x-slot:head><x-include-trix /></x-slot:head>
    <article>
        <h1>Maak een FAQ.</h1>
        @if(key_exists("question", $_GET) || key_exists("answer", $_GET)) <b style="color: red;">Yo, je hebt iets leeggelaten.</b>@endif
        <form action="{{route("faq.store")}}" method="POST">
            @csrf
            <label for="question"><p>Titel: </p></label><input type="text" name="question" @if(!empty($request->get("question")))value="{{ $request->get("question") }}"@endif><br>
            <!--<label for="answer"><p>Inhoud: </p></label><textarea name="answer">@if(!empty($request->get("answer"))){{ $request->get("answer") }}@endif</textarea><br>-->
            <label for="answer"><p>Inhoud: </p></label><input type="hidden" id="answer" name="answer" @if(!empty($request->get("answer")))value="{{ $request->get("answer") }}"@endif><trix-editor input="answer"></trix-editor><br>
            <input type="submit">
            <a href="{{route("faq.index")}}"><button type="button">ga terug</button></a>
        </form>
    </article>

</x-layout>
