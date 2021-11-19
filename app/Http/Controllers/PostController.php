<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $categories = Category::all();
        if($request->has('q')){
    		$q=$request->q;
    		$posts=Post::where('cat_id','like','%'.$q.'%')->orderBy('created_at')->get();
    	}else{
    		$posts = Post::orderBy('created_at')->get();
    	}
                
        return view('posts.index')->with([
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with([
            'categories' => $categories
        ]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required|string',
            'cat_id' => 'required|integer'
        ]);
       

        // Create a new post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cat_id =$request->input('cat_id');
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $post = Post::find($id);
        return view('posts.show')->with([
          
            'post'=> $post
        ]);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
       $post = Post::find($id);
        return view('posts.edit')->with('post', $post);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required|string',
            'cat_id' => 'required|integer'
        ]);

        $post = Post::find($id);
          $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cat_id =$request->input('cat_id');
        $post->save();
         return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
         $post = Post::find($id);
           $post->delete();
        return redirect()->route('posts.index');
    }
}
