@extends('layouts.navbar')

@section('title')
Settings
@endsection

@section('content')
<h1>Edit profile</h1>
<form action="{{route('users.update', $user)}}" method="post">
    @csrf
    @method('patch')
    <div class="form-group">
        <img src="{{$user->avatar}}" alt="Profile Picture" class="img-fluid rounded-circle">
        <label for="photo">New avatar</label>
        <input type="text" class="form-control-file" value="{{$user->avatar}}" name="avatar" id="photo" placeholder="Set the link to new avatar">
    </div>
    <div class="form-group">
        <label for="status">About</label>
        <textarea class="form-control" name="about" id="about">{{$user->about}}</textarea>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" value="{{$user->username}}" name="username" id="name" placeholder="John Johnson">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" value="{{$user->email}}" name="email" id="email" placeholder="name@example.com">
    </div>
    <hr>
    <div class="form-group">
        <label for="password">Old password</label>
        <input type="password" class="form-control" name="old_password" id="password" placeholder="Old password">
    </div>
    <div class="form-group">
        <label for="password">New password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="New password">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection