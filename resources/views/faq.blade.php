<x-layout>
    <x-slot:description>Een pagina met vaalgestelde vragen en hun antwoorden.</x-slot:description>
    <x-slot:title>FAQ</x-slot:title>
    <article>
        <figure class="figuur-rechts" style="width:80px"><img src="/images/hz-logo.svg" width="80"
                                                              alt="Het logo van de HZ">
            <figcaption>Het logo van de HZ</figcaption>
        </figure>
        <h1>Veelgestelde vragen</h1>
        <a href="{{route("faq.create")}}">Maak een FAQ.</a>
        @foreach($faqs as $faq)
            <x-faq>
                <x-slot:question>{!!$faq["question"]!!}</x-slot:question>
                <x-slot:answer>{!!$faq["answer"]!!}</x-slot:answer>
                <x-slot:id>{!!$faq["id"]!!}</x-slot:id>
            </x-faq>
        @endforeach
        @if(count($faqs) < 1) <h2>Er zijn geen FAQs.</h2> @endif
        <hr>
        <div id="plekvulling">Nog meer vragen zijn welkom (maar antwoorden niet gegarandeerd).</div>
    </article>
    <script type="application/javascript">
        function deletePost(id){
            if(confirm("Weet je zeker dat je dat wil doen?")){
                fetch(`/faq/${id}`, {
                    method: 'delete',
                    headers: {'Content-Type': 'application/json', "X-CSRF-TOKEN": "{{ csrf_token() }}"},
                    body: ""
                }).then((res)=>{
                    location.reload();
                });
            }
        }
    </script>

</x-layout>
