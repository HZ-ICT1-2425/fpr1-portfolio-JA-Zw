<section>
    <hr>
    <details>
        <summary><b class="ietsje-groter">{{ $question }}</b> <span style="float: right;"><a href="{{route("faq.edit", $id)}}">edit</a> <a style="color:red;" href="#" onclick="deletePost({{$id}})">delete</a></span></summary>
        {!! $answer !!}
        <form style="display:none" method="POST" action="{{route("faq.destroy", $id)}}" id="delete{{$id}}">@method("DELETE") @csrf</form>
    </details>
</section>
