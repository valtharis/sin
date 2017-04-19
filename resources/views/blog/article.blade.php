@extends("layouts.base")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route("get.blog.article")}}" class="btn btn-default">Back to articles</a>
            </div>
        </div>
        <div class="page-header">
            <h3>{{$article->title}}</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-justify">{{$article->content}}</p>
            </div>
        </div>
    </div>
@endsection