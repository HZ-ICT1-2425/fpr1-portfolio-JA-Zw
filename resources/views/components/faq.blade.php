<hr>
<section>
    <details>
        <summary><b class="ietsje-groter">{{ $question }}</b> <span style="float: right;"><a href="{{route("faq.edit", $id)}}">edit</a> <a style="color:red;" href="#" onclick="deletePost({{$id}})">delete</a></span></summary>
        {!! $answer !!}
    </details>
</section>
