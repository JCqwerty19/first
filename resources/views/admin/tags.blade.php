@extends('layouts.navbar')

@section('title')
Tags
@endsection


@section('navbar')
<li><a href="{{route('site.main')}}" class="nav-link px-2 text-white">
@if(Auth::user() !== null)
Home
@else
Main
@endif
</a></li>
<li><a href="{{route('socials.about')}}" class="nav-link px-2 text-white">About</a></li>
<li><a href="{{route('socials.contacts')}}" class="nav-link px-2 text-white">Contacts</a></li>
@endsection

@section('buttons')
@if(Auth::user() !== null)
<div class="dropdown text-end">
    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{auth()->user()->avatar}}" alt="avatar" width="32" height="32" class="rounded-circle">
    </a>
    <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item" href="{{route('posts.create')}}">New post</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="{{route('users.page')}}">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{route('auth.logout')}}">Logout</a></li>
    </ul>
</div>
@else
<a type="button" class="btn btn-outline-light me-2" href="{{route('auth.login')}}">Login</a>
<a type="button" class="btn btn-warning" href="{{route('auth.register')}}">Register</a>
@endif
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($tags as $tag)
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="{{route('tags.index', $tag)}}"><p class="card-text">#{{$tag->title}}</p></a><br><br>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection