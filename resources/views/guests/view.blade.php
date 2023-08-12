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
<a type="button" class="btn btn-outline-light me-2" href="{{route('auth.login')}}">Login</a>
<a type="button" class="btn btn-warning" href="{{route('auth.register')}}">Register</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-5">
            <img src="{{$post->image}}" class="card-img-top" alt="Фото поста">
            <div class="card-body">
                <h5 class="card-title">{{$post->user()->username}}</h5>
                <p class="card-text">{{$post->content}}</p>
                <hr>
                <h5>Comments</h5>
                <div class="media mt-3">
                    @foreach($post->comments()->get() as $comment)
                    <a href="{{route('users.view', $comment->user())}}"><img src="$comment->user()->image" class="mr-3" alt="img"></a>
                    <div class="media-body">
                        <a href="{{route('users.view', $comment->user())}}"><h5 class="mt-0">{{$comment->user()->username}}</h5></a>
                        <p>{{$comment->content}}</p>
                    </div>
                    @endforeach
                </div>
                <p class="card-text">
                    @foreach($post->tags() as $tag)
                    <a href="{{route('tags.index', $tag)}}">#{{$tag->title}}<br></a>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@endsection