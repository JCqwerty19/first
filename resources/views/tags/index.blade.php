@extends('layouts.navbar')

@section('title')
{{$tag->title}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-5">
            <img src="{{$post->image}}" class="card-img-top" alt="Photo">
            <div class="card-body">
                <a href="route('users.profile', $post->user_id)"><h5 class="card-title">{{$post->user->username}}</h5></a>
                <p class="card-text">{{$post->content}}</p>
                <form action="{{route('posts.like')}}" method="post" novalidate>
                    @csrf
                    <button type="submit" class=""><i class="bi bi-star-fill"></i></button> 
                </form>
                <hr>
                <p class="card-text">
                    @foreach($post->tags() as $tag)
                    <a href="{{route('tags.index', $tag)}}">#{{$tag->title}}<br></a>
                    @endforeach
                </p>
                @if($post->user_id === Auth::id())
                <form action="{{route('posts.destroy', $post)}}" method="post" novalidate>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
                <hr>
                <h5>Comments</h5>
                @if(Auth::user() !== null)
                <form action="{{route('comments.store')}}" method="post" novalidate>
                    @csrf
                    <input type="text" class="form-control" value="{{old('content')}}">
                    <button type="submit">Publish</button>
                </form>
                @endif
                <hr>
                <div class="media mt-3">
                    @foreach($comments as $comment)
                    <a href="{{route('users.profile', $comment->user_id)}}"><img src="$comment->user->image" class="mr-3" alt="img"></a>
                    <div class="media-body">
                        <a href="{{route('users.profile', $comment->user_id)}}"><h5 class="mt-0">{{$comment->user->username}}</h5></a>
                        <p>{{$comment->content}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection