@extends('layouts.app')

@section('content')
<div class="container">
<h1>{{$post->title}}</h1>
  <div class="row">
      <div class="col-9">
<small>Written on {{$post->created_at}}</small>
    
      </div>
      <div class="mr-auto">
             <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
              <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger">Delete</a>
      </div>
  </div>
    
   
    <br><br>
    <div>
        {!!$post->body!!}
    </div>
</div>

    

@endsection