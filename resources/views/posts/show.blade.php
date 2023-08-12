@extends('layouts.navbar')

@section('title')
{{$post->content}}
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
        <img src="{{auth->user->avatar}}" alt="avatar" width="32" height="32" class="rounded-circle">
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
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-5">
            <img src="{{$post->image}}" class="card-img-top" alt="Photo">
            <div class="card-body">
                <a href="{{route('users.profile', $post->user_id)}}"><h5 class="card-title">{{$post->user->username}}</h5></a>
                <p class="card-text">{{$post->content}}</p>
                <!--Post-->
                <form action="{{route('posts.like', $post)}}" method="post" novalidate>
                    @csrf
                    @method('patch')
                    <button type="submit"><i class="bi bi-star-fill"></i></button> 
                </form>
    
                <!--Tags-->
                <p class="card-text">
                    @foreach($post->tags as $tag)
                    <a href="{{route('tags.index', $tag)}}">#{{$tag->title}}<br></a>
                    @endforeach
                </p>

                <!--Delete-->
                @if($post->user_id === Auth::id())
                <form action="{{route('posts.destroy', $post)}}" method="post" novalidate>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif

                <!--Form for comment-->
                <hr>
                <h5>Comments</h5>
                @if(Auth::user() !== null)
                <form action="{{route('comments.store')}}" method="post" novalidate>
                    @csrf
                    <input type="text" class="form-control" value="{{old('content')}}">
                    <button type="submit">Publish</button>
                </form>
                @endif

                <!--Comments-->
                <hr>
                <div class="media mt-3">
                    @foreach($comments as $comment)
                    <a href="{{route('users.profile', $comment->user_id)}}"><img src="$comment->user->image" class="mr-3" alt="img"></a>
                    <div class="media-body">
                        <a href="{{route('users.profile', $comment->user_id)}}"><h5 class="mt-0">{{$comment->user->username}}</h5></a>
                        <p>{{$comment->content}}</p>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection