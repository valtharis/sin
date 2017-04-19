@extends("layouts.manage")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route("get.manage.article")}}" class="btn btn-default">Back to manage</a>
            </div>
        </div>
        <div class="page-header">
            <h1>Article management <small>{{$article->title}}</small></h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('put.manage.article', ["id"=>$article->id])}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control" name="category_id">
                            <option value="{{$article->category->id}}">{{$article->category->name}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Article title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Article content</label>
                        <textarea class="form-control" id="content" name="content" rows="15">{{$article->content}}</textarea>
                    </div>
                    <div class="form-group">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{$error}}</div>
                        @endforeach
                    </div>

                    <div class="btn-group pull-left" role="group" aria-label="...">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
                <form class="pull-right" action="{{route('put.manage.article', ["id"=>$article->id])}}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>
    </div>
@endsection