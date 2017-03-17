@extends('layout')

@section('content')
<ul>
@foreach ($articles as $article)
<li><a href="{{route("article.get", ["id"=>$article->id])}}">{{$article->title}}</a></li>
@endforeach
</ul>
@stop
