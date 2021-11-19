@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Add New</a>
    @if($posts->count() > 0)
        @foreach($posts as $post)
            <div class="card m-1">
                <div class="card-header">
                  <p class="card-title"><a href={{route('posts.show',  $post->id)}} ">{{ $post->title }}</a></p>  
                </div>
                <div class="card-body">
                    {{ $post->body }}

                    <hr>
                    <a href="{{ route('posts.edit', $post->id) }}"></a>
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