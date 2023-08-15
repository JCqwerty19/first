@extends('layouts.navbar')

@section('title')
New Post
@endsection

@section('content')
<h1>New Post</h1>
<form action="{{route('posts.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="image">Image</label>
        <input type="text" class="form-control" value="{{old('image')}}" name="image" id="image" placeholder="Link to image">
    </div>
    @error('image')
        <p class="text-danger">{{$message}}</p>
    @enderror
    <div class="form-group">
        <label for="content">Content</label><br>
        <textarea name="content" id="content" rows="4">{{old('content')}}</textarea>
    </div>
    @error('content')
        <p class="text-danger">{{$message}}</p>
    @enderror
    <div class="form-group">
        <label for="tags">Tags</label><br>
        <select name="tags[]" id="tags">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>
    </div> <br>
    <button type="submit" class="btn btn-primary">Publish</button>
</form>
@endsection