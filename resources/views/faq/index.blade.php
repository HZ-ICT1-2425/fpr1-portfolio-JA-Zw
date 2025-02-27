<x-layout description="Een pagina met vaalgestelde vragen en hun antwoorden." title="FAQ">
    <article>
        <figure class="figuur-rechts" style="width:80px"><img src="/images/hz-logo.svg" width="80"
                                                              alt="Het logo van de HZ">
            <figcaption>Het logo van de HZ</figcaption>
        </figure>
        <h1>Veelgestelde vragen</h1>
        <a class="knop" href="{{route("faq.create")}}">maak een FAQ</a>
        @foreach($faqs as $faq)
            <x-faq>
                <x-slot:question>{{$faq["question"]}}</x-slot:question>
                <x-slot:answer>{!!$faq["answer"]!!}</x-slot:answer>
                <x-slot:id>{{$faq["id"]}}</x-slot:id>
            </x-faq>
        @endforeach
        @if(count($faqs) < 1) <h2>Er zijn geen FAQs.</h2> @endif
        <hr>
        <div id="plekvulling">Nog meer vragen zijn welkom (maar antwoorden niet gegarandeerd).</div>
    </article>
    <script type="application/javascript">
        function deletePost(id){
            if(confirm("Weet je zeker dat je dat wil doen?")){
                document.getElementById(`delete${id}`).submit();
            }
        }
    </script>

</x-layout>
