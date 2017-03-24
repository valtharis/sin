@extends('layout')

@section('content')
<h4>{{$category->name}}</h4>
<ul>
@foreach ($category->articles as $article)
<li>{{$article->title}}</li>
@endforeach
</ul>

<form method="POST" action="{{route("article.post")}}" class="form-horizontal">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Title</span>
  <input type="text" name="title" class="form-control" placeholder="..." aria-describedby="basic-addon1">
</div>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Content</span>
  <textarea name="content" class="form-control" rows="3"></textarea>
</div>  
    <input type="hidden" name="category_id" value="{{$category->id}}">
  
  
  
  <input type="hidden" name="token" value="{{csrf_token()}}">
<div class="btn-group" role="group" aria-label="...">
  <button type="submit" class="btn btn-default">Add article</button>
  <button type="reset" class="btn btn-default">Cancel</button>
  
</div>
</form>



@stop
