@extends('layouts.navbar')

@section('title')
Users
@endsection

@section('content')
<a type="button" class="btn btn-primary" href="{{route('admin.index')}}">Admin panel</a>
<a type="button" class="btn btn-primary" href="{{route('admin.tags')}}">Tags</a>
<br><br>
<h1>Users</h1>
{{$users->links()}}
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Profile</th>
            <th>Delete</th>
        </tr>
    </thead>
    @foreach($users as $user)
    <tbody>
        <td>{{$user->username}}</td>
        <td>{{$user->email}}</td>
        <td><a href="{{route('users.profile', $user)}}"><button type="button" class="btn btn-primary">View</button></a></td>
        <td>
            <form action="{{route('admin.users.destroy', $user)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
        <tr>
    </tbody>
    @endforeach
    
</table>
@endsection