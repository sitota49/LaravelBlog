@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Cateogries</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New</a>
    @if($categories->count() > 0)
    <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item">{{$category->name}}</li>
            @endforeach
        </ul>
        
    @else
        <div class="card card-body m-1">
            <h4>No Category Found</h4>
        </div>
    @endif
</div>

@endsection