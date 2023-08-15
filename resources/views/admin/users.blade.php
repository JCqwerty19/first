@extends('layouts.navbar')

@section('title')
Users
@endsection

@section('content')
<h1>Список пользователей</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Profile</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td><a href="{{route('users.profile', $user)}}"><button type="button" class="btn btn-primary">View</button></a></td>
        @endforeach
        <tr>
    </tbody>
</table>
@endsection