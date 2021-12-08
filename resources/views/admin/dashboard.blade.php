
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                      <a href="{{ route('categories.index') }}" class="btn btn-primary float-right">categories</a>
                    <h3>All Blog Posts</h3>
                    @if($posts->count() > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td> @for ($i = 0; $i < $categories->count(); $i++)
                    @if ($categories[$i]->id == $post->cat_id)
                        
                     {{$categories[$i]->name}}
                    @endif
                        
                    @endfor</td>

                                    <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a></td>
                                    <td>
                                   
                                        {!!Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

