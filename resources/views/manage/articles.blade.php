@extends("layouts.manage")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route("get.manage.home")}}" class="btn btn-default">Back to manage</a>
            </div>
        </div>
        <div class="page-header">
            <h1>Article management</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group pull-right" uib-dropdown is-open="status.isopen">
                    <button id="single-button" type="button" class="btn btn-default" uib-dropdown-toggle ng-disabled="disabled">
                        Articles <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" uib-dropdown-menu role="menu" aria-labelledby="single-button">
                        @foreach($articles as $article)
                            <li role="menuitem"><a href="{{route("get.manage.article", ["id"=>$article->id])}}">{{$article->title}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('post.manage.article')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Article title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Article content</label>
                        <textarea class="form-control" id="content" name="content" rows="15"></textarea>
                    </div>
                    <div class="form-group">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{$error}}</div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-success">Add article</button>
                </form>
            </div>
        </div>
    </div>
@endsection