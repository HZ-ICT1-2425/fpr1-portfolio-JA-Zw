<x-layout description="Een blogpost over {{$post->title}}." title="{{$post->title}}">
    <article>
        <a style="float: right;" href="{{route("posts.edit", $post->slug)}}" class="knop">edit</a>
        <a style="float: right;" href="#" class="knop" onclick="deletePost()" data-huidig>delete</a>
        <h1>{{ $post->title }}</h1>
        {!! $post->body !!}
    </article>
    <form style="display: none" id="delete" method="post" action="{{route("posts.destroy", $post->id)}}">@method("delete")@csrf</form>
    <script type="application/javascript">
        function deletePost(){
            if(confirm("Weet je zeker dat je dat wil doen?")){
                document.getElementById("delete").submit();
            }
        }
    </script>
</x-layout>
