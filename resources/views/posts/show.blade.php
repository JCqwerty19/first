@extends('layouts.navbar')

@section('title')
{{$post->content}}
@endsection

@section('content')
<div class="container">
    <div class="card my-5">
        <div class="card-body">
            <img src="{{$post->image}}" class="card-img-top" alt="Post Image">
            <p class="card-text">{{$post->content}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-primary">Like</button>
                </div>
              <small class="text-muted">{{$post->likes}} likes</small>
            </div>
            <div class="mt-3">
              <ul class="list-inline">
                @foreach($postTags as $tag)
                <li class="list-inline-item"><a href="{{$tag->id}}" class="badge badge-primary">{{$tag->title}}</a></li>
                @endforeach
              </ul>
            </div>
            <a type="button" class="btn btn-secondary" href="{{route('posts.index')}}">Back</a>
            <form action="{{route('posts.destroy', $post)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection