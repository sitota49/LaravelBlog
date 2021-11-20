@extends('layouts.app')

@section('content')

<div class="container">
   
    <h1>Posts</h1>
   
    <a href="{{ route('posts.create') }}" class="btn btn-primary float-right ">Add New</a>
<div class=" my-5 py-3">
     <div class="card mb-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <form action="{{ route('posts.index') }}" method="GET" role="search">
                <div class="input-group">
                     <select class="form-control" name="q">
                        @foreach($categories as $cateogry)
                        <option value="{{$cateogry->id}}">{{$cateogry->name}}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    
    @if($posts->count() > 0)
     @foreach($posts as $post)
            <div class="card my-3">
            
                <div class="row py-2 ">
                    <div class="col-4">
                        <img style="width:100%" src="./storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-8 ">
                        <div class="container align-middle">
                        <h3 clas><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                          <small>
                       @for ($i = 0; $i < $categories->count(); $i++)
                    @if ($categories[$i]->id == $post->cat_id)
                        
                     {{$categories[$i]->name}}
                    @endif
                        
                    @endfor
                      </small>  
                      <br>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
       
        
    @else
        <div class="card card-body m-1">
            <h4>No Post Found</h4>
        </div>
    @endif
</div>

@endsection