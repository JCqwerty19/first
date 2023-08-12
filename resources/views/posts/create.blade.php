@extends('layouts.navbar')

@section('title')
New Post
@endsection

@section('navbar')
<li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
<li><a href="#" class="nav-link px-2 text-white">Features</a></li>
<li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
@endsection

@section('buttons')
<div class="dropdown text-end">
    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{auth()->user()->avatar}}" alt="avatar" width="32" height="32" class="rounded-circle">
    </a>
    <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item" href="#">New post</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
</div>
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