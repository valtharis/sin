@extends('layout')

@section('content')
<ul>
@foreach ($categories as $category)
<li><a href="{{route("category.get", ["id"=>$category->id])}}">{{$category->name}}</a></li>
@endforeach
</ul>


<form method="POST" class="form-horizontal">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Category name</span>
  <input type="text" name="name" class="form-control" placeholder="..." aria-describedby="basic-addon1">
  <input type="hidden" name="token" value="{{csrf_token()}}">
</div>
<div class="btn-group" role="group" aria-label="...">
  <button type="submit" class="btn btn-default">Add category</button>
  <button type="reset" class="btn btn-default">Cancel</button>
  
</div>
</form>


@stop




