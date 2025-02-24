<x-layout>
    <x-slot:description>Een blogpost over {{$post->title}}.</x-slot:description>
    <x-slot:title>{{$post->title}}</x-slot:title>

    <article>
        <a style="float: right;" href="{{route("posts.edit", $post->slug)}}" class="knop">edit</a>
        <a style="float: right;" href="#" class="knop" onclick="deletePost()" data-huidig>delete</a>
        <h1>{{ $post->title }}</h1>
        {!! $post->body !!}
    </article>
    <script type="application/javascript">
        function deletePost(){
            if(confirm("Weet je zeker dat je dat wil doen?")){
                fetch("{{route("posts.destroy", $post->id)}}", {
                    method: 'delete',
                    headers: {'Content-Type': 'application/json', "X-CSRF-TOKEN": "{{ csrf_token() }}"},
                    body: ""
                }).then((res)=>{
                    location.href = "{{route("posts.index")}}";
                });
            }
        }
    </script>
</x-layout>
