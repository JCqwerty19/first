@extends('layouts.navbar')

@section('title')
Login
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
<a type="button" class="btn btn-warning" href="{{route('auth.register')}}">Register</a>
@endif
@endsection

@section('content')
<main class="form-signin w-100 m-auto">
    <form action="{{route('auth.attempt')}}" method="post" novalidate>
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please Login</h1>
        <div class="form-floating">
            <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="name@example.com">
            <label for="email">Email address</label>
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" value="{{old('password')}}" name="password" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" name="remember_token" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Remember me
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
        <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
    </form>
</main>
@endsection