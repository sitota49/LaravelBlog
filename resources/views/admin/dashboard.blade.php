@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

 <a href="{{ route('categories.index') }}" class="btn btn-primary float-left ">categories</a>
  <a href="{{ route('posts.index') }}" class="btn btn-primary float-right ">blogs</a>
</div>

@endsection