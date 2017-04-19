@extends("layouts.base")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route("get.blog.category")}}" class="btn btn-default">Back to categories</a>
            </div>
        </div>
        <div class="page-header">
            <h3>{{$category->name}}</h3>
        </div>
        @foreach($rows as $key => $row)
            <div class="row">
                @foreach($row as $item)
                    <div class="col-md-3">
                        <h2>{{$item->title}}</h2>
                        <p>{{$item->content}}</p>
                        <p><a class="btn btn-secondary" href="{{route("get.blog.article", ["id"=>$item->id])}}"
                              role="button">Read more &raquo;</a></p>
                    </div>
                @endforeach
            </div>
        @endforeach


    </div>
@endsection