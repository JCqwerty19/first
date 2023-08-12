@extends('layouts.navbar')

@section('title')
Main
@endsection

@section('navbar')
<li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
<li><a href="#" class="nav-link px-2 text-white">Features</a></li>
<li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
@endsection

@section('buttons')
<a type="button" class="btn btn-outline-light me-2" href="{{route('auth.login')}}">Login</a>
<a type="button" class="btn btn-warning" href="{{route('auth.register')}}">Register</a>
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($posts as $post)
    <div class="col">
        <div class="card shadow-sm">
            <img src="{{$post->image}}" alt="Post image">
            <div class="card-body">
                <p class="card-text">{{$post->content}}</p><br><br>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('guests.view')}}">View</a>
                    </div>
                    <a href="{{route('users.view', $post->user())}}"><small class="text-body-secondary">{{$post->user()->username}}</small></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection