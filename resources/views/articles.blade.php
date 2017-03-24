@extends('layout')

@section('content')
<button id="btn_showArticles" class="btn btn-default">Wyświetl artykuły</button>
<ul id="list">
<!--@foreach ($articles as $article)
<li><a href="{{route("article.get", ["id"=>$article->id])}}">{{$article->title}}</a></li>
@endforeach-->
</ul>

<script>
 $(document).ready(function(){  
    function getArticles(){
        $("#list").hide();
        $("#list").html("");
        $.get("{{route("xhr.article.get")}}", function(data, status){
            for(var i=0;i<data.length;i++){
                $("#list").append('<li><a href="/article/'+data[i].id+'">'+ data[i].title +'</a>"</li>');
            }
            $("#list").fadeIn(1000);
        });
     }
    $("#btn_showArticles").click(function(){
        getArticles();
    });
 });
 
</script>







@stop

