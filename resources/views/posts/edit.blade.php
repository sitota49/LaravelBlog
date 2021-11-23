@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit post</h1>
     {!! Form::open(['route' => ['posts.update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
     
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
         <div class="form-group">
            {{ Form::select('cat_id', $categories->pluck('name', 'id'), $post->cat_id, ['class' => 'form-control w-100','placeholder' => 'Pick a category...' ])}} 
        </div>
       <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id' => 'wysiwyg-editor', 'class' => 'form-control ckeditor ', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

 
</div>

@endsection