@extends('layouts.navbar')

@section('title')
Login
@endsection

@section('buttons')
<a type="button" class="btn btn-warning" href="{{route('auth.register.index')}}">Register</a>
@endsection

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <h1>Login</h1>
            <form action="{{route('auth.login.check')}}" method="post" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" value="{{old('email')}}">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
                    </div>
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
        </div>
    </div>
</div>
@endsection