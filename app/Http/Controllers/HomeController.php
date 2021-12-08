<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(Request $request)
    {
        // dd(auth()->user()->userRoles()->with(['role', 'user'])->get());
        // if(auth()->user()->hasRole("Super Admin")) {
        //     dd("This user is super admin");
        // } else {
        //     dd("This user is not");
        // }
      

         $categories = Category::all();
        if($request->has('q')){
    		$q=$request->q;
    		$posts=Post::where('cat_id','like','%'.$q.'%')->orderBy('created_at')->get();
    	}else{
    		$posts = Post::orderBy('created_at')->get();
    	}
                
        return view('home')->with([
            'posts' => $posts,
            'categories' => $categories,
          
        ]);
    }
}
