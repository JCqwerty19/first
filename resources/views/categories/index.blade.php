@extends('layouts.navbar')

@section('title')
{{$category->title}}
@endsection

@section('content')
<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($posts as $post)
            <div class="col">
                <div class="card shadow-sm">
                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{$post->image}}">
                    <div class="card-body">
                        <p class="card-text">{{$post->content}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('posts.show', $post)}}">View</a>
                                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('posts.edit', $post)}}">Edit</a>
                            </div>
                            <small class="text-body-secondary">{{$post->likes}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div>
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection