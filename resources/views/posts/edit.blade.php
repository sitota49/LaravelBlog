@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
            @if($errors->has('title'))
                <p class="text-danger">title field is required</p>
            @endif
        </div>
        <div class="form-group">
            <label for="body">Body</label>
          
            <textarea name="body" cols="30" rows="10" class="form-control" >
                {{$post->body}}
            </textarea>
             @if($errors->has('body'))
                <p class="text-danger">body field is required</p>
            @endif
        </div>
        <div class="form-group">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>

@endsection