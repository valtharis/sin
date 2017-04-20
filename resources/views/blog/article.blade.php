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
        <div ng-controller="commentController" ng-init="article_id={{$article->id}}">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <form name="commentForm" novalidate>
                            <div class="form-group" ng-class="{&quot;has-error&quot;: commentForm.author.$invalid && commentForm.author.$dirty}">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" id="author" name="author" required ng-minlength="2" ng-maxlength="32" ng-model="comment.author"
                                       placeholder="Author name">

                            </div>
                            <div class="form-group" ng-class="{&quot;has-error&quot;: commentForm.content.$invalid && commentForm.content.$dirty}">
                                <label for="content">Comment</label>
                                <textarea class="form-control" id="content" name="content" required ng-minlength="3" ng-maxlength="300" ng-model="comment.content" rows="5"
                                          placeholder="Comment message..."></textarea>

                            </div>

                            <div class="btn-group pull-right" role="group">
                                <button type="button" ng-click="send()" class="btn btn-success" ng-disabled="commentForm.$invalid">Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div uib-alert ng-repeat="error in errors" class="alert-danger"
                             close="closeAlert($index)">@{{ error }}</div>
                    </div>
                </div>
                <div class="page-header">
                    <h3>Comments (@{{ comments.length }})</h3>
                </div>
                <div class="panel panel-default" ng-repeat="comment in comments | orderBy : '-created_at'">
                    <div class="panel-heading">@{{comment.author}}<span
                                class="pull-right">Sent: @{{ comment.created_at }}</span></div>
                    <div class="panel-body">
                        @{{comment.content}}
                    </div>
                    <div class="panel-footer">
                        <div class="btn-group" role="group">
                        <button class="btn btn-primary" ng-click="like(comment)">Like it&nbsp;<span
                                    class="badge">@{{ comment.likes_count }}</span></button>
                        <button class="btn btn-danger" ng-click="delete(comment)">Delete</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection