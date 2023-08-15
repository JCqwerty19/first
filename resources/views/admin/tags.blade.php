@extends('layouts.navbar')

@section('title')
Tags
@endsection

@section('content')
<a type="button" class="btn btn-primary" href="{{route('admin.index')}}">Admin panel</a>
<a type="button" class="btn btn-primary" href="{{route('admin.users')}}">Users</a>
<br><br>
<h1>Tags</h1>
{{$tags->links()}}
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($tags as $tag)
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="{{route('tags.index', $tag)}}"><p class="card-text">#{{$tag->title}}</p></a><br><br>
                <form action="{{route('admin.tags.destroy', $tag)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
        </div>
    </div>
    @endforeach
    
</div>
@endsection