@extends('layouts.navbar')

@section('title')
{{$user->username}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <!-- Фото профиля -->
        <img src="{{$user->avatar}}" alt="Profile Picture" class="img-fluid rounded-circle">
    </div>
    <div class="col-md-8">
        <!-- Описание -->
        <h2>About:</h2>
        <span>{{$user->about}}</span>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <!-- Список постов -->
        <h3>{{$user->username}}</h3>
        <ul class="list-group">
            @foreach($posts as $post)
            <li class="list-group-item">
                <a href="{{route('posts.show', $post)}}">
                    <img src="{{$post->image}}" alt="img">
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection