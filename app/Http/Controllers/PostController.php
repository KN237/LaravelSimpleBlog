<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  
  public function show_create()
  {
    $categories = Category::all();
    $tags = Tag::all();
    return view('admin/posts/create', compact('categories', 'tags'));
  }

  public function create(Request $req)
  { 
    $req->validate(
      [
        "titre"=>"required",
        "contenu"=>"required",
        "banniere"=>"required|image|dimensions:min_width=520,min_height=425",
      ]);

    $art_title = $req->request->get('titre');
    $art_desc = $req->request->get('contenu');

    $art_banniere = uniqid() . "" . $req->file('banniere')->getClientOriginalName();

    $allow_formats = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG', 'gif', 'GIF'];

    $format_check = explode(".", $art_banniere);

    if (in_array($req->file('banniere')->extension(), $allow_formats)) {
      try {
        $post = Post::create([
          'titre' => $art_title,
          'contenu' => $art_desc,
          'banniere' => $art_banniere,
          'category_id' => $req->categorie,
          'user_id' => Auth::user()->id,
          'created_at' => now()

        ]);

        
        foreach ($req->tags  as $t) {
          $post->tags()->attach($t);
        }

        try {
          if ($req->file('banniere')->storeAs('public/articles', $art_banniere)) {
            return back()->with('success', 'Ajout éffectuée avec succès');
          }
        } catch (Exception $x) {
          return back()->with('error', 'Echec de l\'ajout');
        }
      } catch (Exception $x) {
        return back()->with('error', "Echec de l\'ajout");
      }
    } else {
      return back()->with('error', 'Le format de l\'image est pas valide.');
    }
  }

  public function show_edit(int $id)
  {
    $post = Post::where('id', $id)->first();
    $posttags=$post->tags()->get();
    $posttag=[];
    foreach ($posttags as $p) {
      array_push($posttag,$p->id);
    }
    $categories = Category::all();
    $tags = Tag::all();
    return view('admin/posts/edit', compact('post', 'categories', 'tags','posttag','posttags'));
  }

  public function edit(Request $req, int $id)
  {
    if($req->file('banniere')){

      $req->validate(
        [
          "titre"=>"required",
          "contenu"=>"required",
          "banniere"=>"required|image|dimensions:min_width=520,min_height=425",
        ]);
  
      $art_title = $req->request->get('titre');
      $art_desc = $req->request->get('contenu');
  
      $art_banniere = uniqid() . "" . $req->file('banniere')->getClientOriginalName();
  
      $allow_formats = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG', 'gif', 'GIF'];
  
      $format_check = explode(".", $art_banniere);
  
      if (in_array($req->file('banniere')->extension(), $allow_formats)) {
        try {
          $post = Post::where('id',$id)->update([
            'titre' => $art_title,
            'contenu' => $art_desc,
            'banniere' => $art_banniere,
            'category_id' => $req->categorie,
            'updated_at' => now()
  
          ]);

          $p=Post::where('id',$id)->first();

          $p->tags()->sync($req->tags);
    
          try {
            if ($req->file('banniere')->storeAs('public/articles', $art_banniere)) {
              return back()->with('success', 'Mise à jour éffectuée avec succès');
            }
          } catch (Exception $x) {
            return back()->with('error', 'Echec de l\'ajout');
          }
        } catch (Exception $x) {
          return back()->with('error', "Echec de l\'ajout");
        }
      } else {
        return back()->with('error', 'Le format de l\'image est pas valide.');
      }


    }
    else{

      $req->validate(
        [
          "titre"=>"required",
          "contenu"=>"required"
        ]);
  
      $art_title = $req->request->get('titre');
      $art_desc = $req->request->get('contenu');

        try {
          $post = Post::where('id',$id)->update([
            'titre' => $art_title,
            'contenu' => $art_desc,
            'category_id' => $req->categorie,
            'updated_at' => now()
  
          ]);

          $p=Post::where('id',$id)->first();

          $p->tags()->sync($req->tags);

          return back()->with('success', "Mise à jour éffectuée avec succès");
        }
          catch (Exception $x) {
          return back()->with('error', "Echec de l\'ajout $x");
        }
      
    }
  }


  public function show_delete(int $id)
  {
    $post = Post::where('id', $id)->first();
    return view('admin/posts/delete', compact('post'));
  }

  public function delete(int $id)
  { 
     try{
      $post=Post::where('id',$id)->first();
      $delposts=DB::table('post_tag')->where('post_id',$post->id)->delete();
      $post->delete();
      $posts=Post::all();
      return redirect('admin/posts')->with('success', 'Suppréssion éffectuée avec succès')
      ->with(['posts'=>$posts]);
    }
      catch(Exception $x){
        $posts=Post::all();
        return redirect('admin/posts')->with('error', 'Suppréssion échouée')
        ->with(['posts'=>$posts])
        ;
     
      }
  
  
  }
}
