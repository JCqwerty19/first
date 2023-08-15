@extends('layouts.navbar')

@section('title')
Register
@endsection

@section('content')
<main class="form-signin w-100 m-auto">
    <form action="{{route('auth.create')}}" method="post" novalidate>
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please Register</h1>
        <div class="form-floating">
            <input type="username" class="form-control" value="{{old('email')}}" name="username" id="username" placeholder="John Johnson">
            <label for="username">Name</label>
            @error('username')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
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
        <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
        <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
    </form>
</main>
@endsection