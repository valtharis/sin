@extends('layouts.manage')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="list-group">
                    <a href="{{route("get.manage.category")}}" class="list-group-item">Category management</a>
                    <a href="{{route("get.manage.article")}}" class="list-group-item">Article management</a>
                    <a href="#" class="list-group-item">Settings</a>
                </div>
            </div>
        </div>
    </div>
@endsection