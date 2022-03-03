<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
        $posts=Post::all();
        $tags=Tag::all();
        $categories=Category::all();
        $users=User::all();
        return view('admin/index',compact('posts','tags','categories','users'));
      }

    public function posts(){
        $posts=Post::all();
        return view('admin/posts',compact('posts'));
      }

      public function tags(){
        $tags=Tag::all();
        return view('admin/tags',compact('tags'));
      }

      public function categories(){
        $categories=Category::all();
        return view('admin/categories',compact('categories'));
      }

      public function users(){
        $users=User::all();
        return view('admin/users',compact('users'));
      }
}
