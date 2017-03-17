@extends('layout')

@section('content')
<h4>{{$article->title}}</h4>
<h4>{{$article->author}}</h4>
<p>
    {{$article->content}}
</p>
@stop
