@extends('layout')

@section('content')
<h4>{{$article->title}}</h4>
<h4>{{$article->author}}</h4>
<p>
    {{$article->content}}
</p>


<form id="form" method="POST" class="form-horizontal">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Author</span>
  <input type="text" name="author" class="form-control" placeholder="..." aria-describedby="basic-addon1">
  <input type="hidden" name="token" value="{{csrf_token()}}">
</div>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Content</span>
  <textarea name="content" class="form-control" rows="3"></textarea>
</div>  
  <input type="hidden" name="article_id" value="{{$article->id}}">
  
    
    
    
    
    
<div class="btn-group" role="group" aria-label="...">
  <button id="saveComment" type="button" class="btn btn-default">Add comment</button>
  <button type="reset" class="btn btn-default">Cancel</button>
  
</div>
</form>

<script>
 $(document).ready(function(){  

     
    function saveComment(){
        var data = $("#form").serialize();
        console.log(data);

     }
    $("#saveComment").click(function(){
        saveComment();
    });
 });
 
</script>


@stop
