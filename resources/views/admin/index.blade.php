@extends('layouts.navbar')

@section('title')
Admin Panel
@endsection

@section('content')
<div class="d-grid gap-2 col-6 mx-auto">
    <a href="{{route('admin.users')}}"><button class="btn btn-primary" type="button">Users</button></a>
    <a href="{{route('site.main')}}"><button class="btn btn-primary" type="button">Posts</button></a>
    <a href="{{route('admin.tags')}}"><button class="btn btn-primary" type="button">Tags</button></a>
</div>
@endsection