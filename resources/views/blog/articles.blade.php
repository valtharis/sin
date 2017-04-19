@extends("layouts.base")

@section('content')
    <div class="container">
        <div class="page-header">
            <h3>Articles</h3>
        </div>
        @foreach($rows as $key => $row)
            <div class="row">
                @foreach($row as $item)
                    <div class="col-md-3">
                        <h2><a href="{{route("get.blog.article", ["id"=>$item->id])}}"> {{$item->title}}</a></h2>
                        <p>{{$item->content}}</p>
                        <p><a class="btn btn-secondary" href="{{route("get.blog.article", ["id"=>$item->id])}}"
                              role="button">Read more &raquo;</a></p>
                    </div>
                @endforeach
            </div>
        @endforeach


    </div>
@endsection