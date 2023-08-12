@extends('layouts.navbar')

@section('title')
{{$post->content}}
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
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-5">
            <img src="{{$post->image}}" class="card-img-top" alt="Photo">
            <div class="card-body">
                <h5 class="card-title">{{$post->user()->username}}</h5>
                <p class="card-text">{{$post->content}}</p>
                <hr>
                <p class="card-text">
                    @foreach($post->tags() as $tag)
                    <a href="{{route('tags.index', $tag)}}">#{{$tag->title}}<br></a>
                    @endforeach
                </p>
                <form action="{{route('posts.destroy', $post)}}" method="post" novalidate>
                    <button type="submit">Delete</button>
                </form>
                <hr>
                <h5>Comments</h5>
                <form action="{{route('comments.store')}}" method="post" novalidate>
                    <input type="text" value="{{auth()->user()->id}}">
                    <input type="text" class="form-control" value="{{old('content')}}">
                    <button type="submit">Publish</button>
                </form>
                <hr>
                <div class="media mt-3">
                    @foreach($post->comments()->get() as $comment)
                    <a href="{{route('users.view', $comment->user())}}"><img src="$comment->user()->image" class="mr-3" alt="img"></a>
                    <div class="media-body">
                        <a href="{{route('users.view', $comment->user())}}"><h5 class="mt-0">{{$comment->user()->username}}</h5></a>
                        <p>{{$comment->content}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection