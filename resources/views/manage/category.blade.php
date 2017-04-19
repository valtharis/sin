@extends("layouts.manage")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route("get.manage.category")}}" class="btn btn-default">Back to categories</a>
            </div>
        </div>
        <div class="page-header">
            <h1>Edit category
                <small>{{$category->name}}</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <form action="{{route('put.manage.category', ["id"=>$category->id])}}" method="POST">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="name">Category name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name"
                               value="{{$category->name}}">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{$error}}</div>
                        @endforeach
                    </div>
                    <div class="btn-group pull-left" role="group" aria-label="...">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
                <form class="pull-right" action="{{route('put.manage.category', ["id"=>$category->id])}}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
@endsection
