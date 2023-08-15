@extends('layouts.navbar')

@section('title')
Likes: {{$post->likes->count()}}
@endsection

@section('content')
<h1>Likes: {{$post->likes->count()}}</h1>
<div class="row">
    <div class="col-md-6">
        <ul class="list-group">
            @foreach($likes as $like)
            <li class="list-group-item">
                <img src="{{$like->user->avatar}}" alt="User's avatar" class="avatar">
                <a href="{{route('users.profile', $like->user->id)}}"><span class="username">{{$like->user->username}}</span></a>
            </li>
            @endforeach
          <!-- Добавьте больше пользователей, если необходимо -->
        </ul>
    </div>
</div>
@endsection