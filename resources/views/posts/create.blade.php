@extends('layouts.navbar')

@section('title')
New Post
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
<h1>New Post</h1>
<form action="{{route('posts.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="image">Image</label>
        <input type="text" class="form-control" value="{{old('image')}}" name="image" id="image" placeholder="Link to image">
    </div>
    @error('image')
        <p class="text-danger">{{$message}}</p>
    @enderror
    <div class="form-group">
        <strong><input type="text" name="user" value="{{auth()->user()->id}}"></strong>
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content" rows="4">{{old('content')}}</textarea>
    </div>
    @error('content')
        <p class="text-danger">{{$message}}</p>
    @enderror
    <div class="form-group">
        <label for="tags"></label>
        <select name="tags[]" id="tags">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Publish</button>
</form>
@endsection