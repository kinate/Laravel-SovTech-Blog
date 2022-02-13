<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class NavigationController extends Controller
{
    public function index(){
        $posts=Post::with('user')->OrderBy('id','desc')->take(3)->get();
        $authors=User::with('posts')->take(4)->get();
        return view('index',compact("posts","authors"));
    }
}
