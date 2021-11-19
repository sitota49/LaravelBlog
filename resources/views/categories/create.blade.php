@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create a new category</h1>

    <form action="{{ route('categories.store', ) }}" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Category Name">
            @if($errors->has('name'))
                <p class="text-danger">name field is required</p>
            @endif
        </div>
         <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Category Description">
            @if($errors->has('description'))
                <p class="text-danger">description field is required</p>
            @endif
        </div>
        <div class="form-group">
            @csrf
            <!-- <input type="hidden" name="_method" value="PUT"> -->
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>

@endsection