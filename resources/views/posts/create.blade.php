@extends('layouts.navbar')

@section('title')
Create
@endsection

@section('content')
<form action="{{route('posts.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="text" class="form-control" id="image" name="image" value="{{old('image')}}">
        @error('image')
        <p class="text-danger">$message</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Password</label>
        <textarea type="text" class="form-control" id="content" name="content">{{old('content')}}</textarea>
        @error('content')
        <p class="text-danger">$message</p>
        @enderror
    </div>
    <label for="category_id" class="form-label">Category</label>
    <section id="category_id" name="category_id">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </section>
    <section id="tags[]" name="tags">
        @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->title}}</option>
        @endforeach
    </section>
    <button type="submit" class="btn btn-primary">Public</button>
</form>
@endsection