@extends('layout')

@section('content')
<h4>{{$category->name}}</h4>
<ul>
@foreach ($category->articles as $article)
<li>{{$article->title}}</li>
@endforeach
</ul>
@stop
