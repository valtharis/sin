<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <script src="{{asset("jquery.js")}}"></script>
    </head>
    <body>
        <h3>Tu bedzie nasze menu</h3>
        @include('menu')
        @yield('content')  
    </body>
</html>


