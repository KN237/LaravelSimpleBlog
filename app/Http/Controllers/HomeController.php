<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Jorenvh\Share\Share as ShareShare;
use Share;

class HomeController extends Controller
{
    public function index(){
       $recentposts=Post::orderBy('created_at','DESC')->take(5)->get();
       $oldposts=Post::orderBy('created_at','ASC')->take(5)->get();
       $tags=Tag::all();
       $categories=Category::all();
       return view('main/index',compact('tags','categories','recentposts','oldposts'));
    }

    public function post(){
        $recentposts=Post::orderBy('created_at','DESC')->paginate(5); 
        $posts=Post::paginate(5);
        $tags=Tag::all();
        return view('main/posts',compact('tags','recentposts','posts'));
      }
 

    public function show(int $id){
        $recentposts=Post::orderBy('created_at','DESC')->take(5)->get(); 
        $post=Post::where('id',$id)->first();
        $tags=Tag::all();
        $categories=Category::all();
        $temp=Share::page(url()->current()."".$post->id,$post->titre)
          ->facebook()
          ->twitter()
          ->getRawLinks();

        return view('main/post',compact('tags','categories','recentposts','post','temp'));
      }

      public function byTag(String $tag){
        $recentposts=Post::orderBy('created_at','DESC')->paginate(5); 
        $temp=Tag::where('nom',$tag)->first();
        $posts=$temp->posts()->paginate(5);
        $tags=Tag::all();
        return view('main/posts',compact('tags','recentposts','posts'));
      }

      public function byCategory(String $category){
        $recentposts=Post::orderBy('created_at','DESC')->paginate(5); 
        $temp=Category::where('nom',$category)->first();
        $posts=$temp->posts()->paginate(5);
        $tags=Tag::all();
        return view('main/posts',compact('tags','recentposts','posts'));
      }

      public function bySearch(Request $req){
        $recentposts=Post::orderBy('created_at','DESC')->paginate(5);
        $posts=Post::where('titre','like','%'.$req->key.'%')->paginate(5);
        $tags=Tag::all();
        return view('main/posts',compact('tags','recentposts','posts'));
      }
}
