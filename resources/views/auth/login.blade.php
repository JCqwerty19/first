@extends('layouts.navbar')

@section('title')
Login
@endsection

@section('navbar')
<li><a href="#" class="nav-link px-2 text-white">Main</a></li>
<li><a href="#" class="nav-link px-2 text-white">Features</a></li>
<li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
@endsection

@section('buttons')
<a type="button" class="btn btn-warning" href="{{route('auth.register')}}">Register</a>
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