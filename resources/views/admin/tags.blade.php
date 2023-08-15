@extends('layouts.navbar')

@section('title')
Tags
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($tags as $tag)
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="{{route('tags.index', $tag)}}"><p class="card-text">#{{$tag->title}}</p></a><br><br>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection