@extends('layouts.app')

@section('content')
<div class="container">
<h1>{{$post->title}}</h1>
  <div class="row">
      <div class="col-8">
        <small>Number of views: {{$views}}</small><br>
        
<small>Written on {{$post->created_at}}</small>
    
      </div>
      @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
      <div class="col-1">
             <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
      </div>
      <div class="col-1">
            {!!Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
  </form>
      </div>
        @endif
    @endif
             
      </div>
  </div>
    
   
    <br><br>
    <div class="container">
        <hr>
        {!!$post->body!!}
    </div>
</div>

    

@endsection