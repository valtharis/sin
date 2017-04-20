<!DOCTYPE html>
<html>
<head xmlns="http://www.w3.org/1999/html">
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,700&amp;subset=latin-ext"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">
    @yield('css')
</head>
<body ng-app="sin.app">
@section('menu')
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" ng-click="vm.isCollapsed = !vm.isCollapsed"
                        data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route("get.blog.home")}}">Blog</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" uib-collapse="vm.isCollapsed" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{route("get.blog.category")}}">Categories</a></li>
                    <li><a href="{{route("get.blog.article")}}">Articles</a></li>
                    {{--<li class="dropdown" uib-dropdown>--}}
                    {{--<a href="#" class="dropdown-toggle" uib-dropdown-toggle data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu" uib-dropdown-menu>--}}
                    {{--<li><a href="#">Action</a></li>--}}
                    {{--<li><a href="#">Another action</a></li>--}}
                    {{--<li><a href="#">Something else here</a></li>--}}
                    {{--<li role="separator" class="divider"></li>--}}
                    {{--<li><a href="#">Separated link</a></li>--}}
                    {{--<li role="separator" class="divider"></li>--}}
                    {{--<li><a href="#">One more separated link</a></li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                </ul>
                <form action="{{route("post.blog.search")}}" method="post" class="navbar-form navbar-right" role="search">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" placeholder="What are you looking for?">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route("get.manage.home")}}">Manage</a></li>
                    {{--<li class="dropdown" uib-dropdown>--}}
                    {{--<a href="#" class="dropdown-toggle" uib-dropdown-toggle data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu" uib-dropdown-menu>--}}
                    {{--<li><a href="#">Action</a></li>--}}
                    {{--<li><a href="#">Another action</a></li>--}}
                    {{--<li><a href="#">Something else here</a></li>--}}
                    {{--<li role="separator" class="divider"></li>--}}
                    {{--<li><a href="#">Separated link</a></li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
@show

@yield('content')

<footer class="footer">
<div class="container">
        <p class="text-muted">&copy; app.sin 2017</p>
</div>
</footer>
<script src="{{ asset('js/angular/angular.min.js')}}"></script>
<script src="{{ asset('js/angular-animate.min.js')}}"></script>
<script src="{{ asset('js/ui-bootstrap.min.js')}}"></script>
<script src="{{ asset('js/ui-bootstrap-tpls.min.js')}}"></script>
<script src="{{ asset('js/app.js')}}"></script>
@yield('script')
</body>
</html>