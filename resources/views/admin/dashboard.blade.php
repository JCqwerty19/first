@extends('layouts.navbar')

@section('title')
Dashboard
@endsection

@section('buttons')
<form action="{{route('auth.logout')}}" method="get">
    @csrf
    <button type="submit" class="btn btn-outline-light me-2">Logout</button>
</form>

@endsection

@section('content')
<div class="row">
    <div class="col">
        <!-- Здесь размещаем содержимое первой колонки -->
        <h1>Welcome to the Dashboard</h1>
    </div>
    <div class="col">
      <!-- Здесь размещаем содержимое второй колонки -->
      <p>This is the second column of the dashboard.</p>
    </div>
    <div class="row">
        <div class="col">
            <!-- Здесь размещаем содержимое третьей колонки -->
            <p>This is the third column of the dashboard.</p>
        </div>
    </div>
</div>
@endsection