@extends('layouts.base')

@section('content')

    @if($header)
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">{{$header->title}}</h1>
            <p>{{$header->content}}</p>
            <p><a class="btn btn-primary btn-lg" href="{{route("get.blog.article", ["id"=>$header->id])}}" role="button">Read more &raquo;</a></p>
        </div>
    </div>
    @endif

    <div class="container">
        <div class="row">
            @foreach($latest as $item)
            <div class="col-md-4">
                <h2>{{$item->title}}</h2>
                <p>{{$item->content}}</p>
                <p><a class="btn btn-secondary" href="{{route("get.blog.article", ["id"=>$item->id])}}" role="button">Read more &raquo;</a></p>
            </div>
            @endforeach
        </div>
    </div>
@endsection