@extends("layouts.manage")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route("get.manage.home")}}" class="btn btn-default">Back to manage</a>
            </div>
        </div>
        <div class="page-header">
            <h1>Category management</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('post.manage.category')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="name">Category name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{$error}}</div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-success">Add category</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="list-group">
                    @foreach($categories as $category)
                        <a href="{{route("get.manage.category", ["id"=>$category->id])}}"
                           class="list-group-item list-group-item-action">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection