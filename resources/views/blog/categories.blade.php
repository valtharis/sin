@extends("layouts.base")

@section('content')
    <div class="container">
        <div class="page-header">
            <h3>Categories</h3>
        </div>
        <div class="list-group">
            @foreach($categories as $category)
            <a href="{{route("get.blog.category", ["id"=>$category->id])}}" class="list-group-item">
                <span class="badge">{{$category->articles()->count()}}</span>
                {{$category->name}}
            </a>
            @endforeach
        </div>
    </div>
@endsection