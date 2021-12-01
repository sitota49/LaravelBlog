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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
    {
        // dd(auth()->user()->userRoles()->with(['role', 'user'])->get());
        // if(auth()->user()->hasRole("Super Admin")) {
        //     dd("This user is super admin");
        // } else {
        //     dd("This user is not");
        // }
        $categories = Category::all();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with([
            'categories' => $categories,
            'posts'=> $user->posts
        ]);
    }
}
