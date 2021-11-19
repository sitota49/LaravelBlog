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
            <div class="card m-1">
                <div class="card-header">
                  <p class="card-title"><a href={{route('posts.show',  $post->id)}} ">{{ $post->title }}</a></p>
                  <small>
                       @for ($i = 0; $i < $categories->count(); $i++)
                    @if ($categories[$i]->id == $post->cat_id)
                        
                     {{$categories[$i]->name}}
                    @endif
                        
                    @endfor
                      </small>  

                </div>
                <div class="card-body">
                   
                   
                  
                    {{ $post->body }}

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