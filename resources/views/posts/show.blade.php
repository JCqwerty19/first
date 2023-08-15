@extends('layouts.navbar')

@section('title')
{{$post->content}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-5">
            <img src="{{$post->image}}" class="card-img-top" alt="Photo">
            <div class="card-body">

                <!--Post-->    
                <a href="{{route('users.profile', $post->user_id)}}"><h5 class="card-title">{{$post->user->username}}</h5></a>
                <p class="card-text">{{$post->content}}</p>

                <!--Tags-->
                <p class="card-text">
                    @foreach($post->tags as $tag)
                    <a href="{{route('tags.index', $tag)}}">#{{$tag->title}}<br></a>
                    @endforeach
                </p>
                
                <!--Like-->
                <p>Likes: {{$likes}} </p>
                <form action="{{route('likes.like', $post)}}" method="post" novalidate>
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary">Like</button>
                </form>
                <a href="{{route('likes.index', $post)}}">Show</a>
                
                @if(Auth::user() !== null)
                <!--Delete-->
                @if($post->user_id === Auth::id() || Auth::user()->status === 'admin')
                <form action="{{route('posts.destroy', $post)}}" method="post" novalidate>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
                @endif

                <!--Form for comment-->
                <hr>
                <h5>Comments: {{$post->comments->count()}}</h5>
                @if(Auth::user() !== null)
                <form action="{{route('comments.comment', $post)}}" method="post" novalidate>
                    @csrf
                    <input type="text" class="form-control" value="{{old('content')}}" name="content"><br>
                    <button class="btn btn-primary" type="submit">Publish</button>
                </form>
                @endif

                <!--Comments-->
                <hr>
                @if(Auth::user() !== null)
                <div class="media mt-3">
                    @foreach($comments as $comment)
                    <a href="{{route('users.profile', $comment->user_id)}}"><img src="{{$comment->user->avatar}}" class="mr-3" alt="img"></a>
                    <div class="media-body">
                        <a href="{{route('users.profile', $comment->user_id)}}"><h5 class="mt-0">{{$comment->user->username}}</h5></a>
                        <p>{{$comment->content}}</p>
                        @if($comment->user_id === Auth::user()->id || Auth::user()->status === 'admin')
                        <form action="{{route('comments.destroy', $comment)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endif
                    </div>
                    <hr>
                    @endforeach
                </div>
                @else
                <p><a href="{{route('auth.login')}}">Login</a> for view comments</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection