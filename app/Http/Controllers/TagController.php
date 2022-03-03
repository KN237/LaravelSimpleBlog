<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function show_create()
    {
      return view('admin/tags/create');
    }
  
    public function create(Request $req)
    {
  
      $art_title = $req->request->get('nom');

        try {
            Tag::create([
            'nom' => $art_title,
            'created_at' => now()
  
          ]);
  
          return back()->with('success', "Ajout éffectuée avec succès");
        } catch (Exception $x) {
          return back()->with('error', "Echec de l\'ajout");
        }
    }
  
    public function show_edit(int $id)
    {
      $tag = Tag::where('id', $id)->first();
      return view('admin/tags/edit', compact('tag'));
    }
  
    public function edit(Request $request, int $id)
    {
      try {
        Tag::where('id',$id)->update([
        'nom' => $request->nom,
        'updated_at' => now()

      ]);

      return back()->with('success', "Mise à jour éffectuée avec succès");
    } catch (Exception $x) {
      return back()->with('error', "Echec de la mise à jour");
    }
    
    }
  
    public function show_delete(int $id)
    {
      $tag = Tag::where('id', $id)->first();
      return view('admin/tags/delete', compact('tag'));
    }
  
    public function delete(int $id)
    { 
        try{
          
        $tag=Tag::where('id',$id)->first();
        $tag->delete();
        $tags=Tag::all();
        return redirect('admin/tags')->with('success', 'Suppréssion éffectuée avec succès')
        ->with(['tags'=>$tags]);
      }
        catch(Exception $x){
          $tags=Tag::all();
          return redirect('admin/tags',compact('tags'))->with('error', 'Suppréssion échouée')
          ->with(['tags'=>$tags])
          ;
       
        }
    
    
    }
}


