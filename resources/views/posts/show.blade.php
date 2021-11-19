@extends('layouts.app')

@section('content')
<div class="container">
<h1>{{$post->title}}</h1>
  <div class="row">
      <div class="col-8">
<small>Written on {{$post->created_at}}</small>
    
      </div>
      <div class="col-1">
             <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
      </div>
      <div class="col-1">
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                  @csrf
            <input type="hidden" name="_method" value="DELETE">
              <input type="submit" value="Delete" class="btn btn-danger">
            
              </form>
      </div>
             
      </div>
  </div>
    
   
    <br><br>
    <div class="container">
        <hr>
        {!!$post->body!!}
    </div>
</div>

    

@endsection