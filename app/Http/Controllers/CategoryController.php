<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show_create()
    {
      return view('admin/categories/create');
    }
  
    public function create(Request $req)
    {
  
      $art_title = $req->request->get('nom');

        try {
            Category::create([
            'nom' => $art_title,
            'created_at' => now()
  
          ]);
  
          return back()->with('success', 'Ajout éffectuée avec succès');
        } catch (Exception $x) {
          return back()->with('error', 'Echec de l\'ajout');
        }
    }
  
    public function show_edit(int $id)
    {
      $category = Category::where('id', $id)->first();
      return view('admin/categories/edit', compact('category'));
    }
  
    public function edit(Request $request, int $id)
    {
      try {
           Category::where('id',$id)->update([
          'nom' => $request->nom,
          'updated_at' => now()

        ]);

        return back()->with('success', 'Mise à jour éffectuée avec succès');
      } catch (Exception $x) {
        return back()->with('error', 'Echec de la mise à jour');
      }

    }
  
    public function show_delete(int $id)
    {
      $category = Category::where('id', $id)->first();
      return view('admin/categories/delete', compact('category'));
    }
  
    public function delete(int $id)
    { 
        try{
          
        $category=Category::where('id',$id)->delete();

        $categories=Category::all();
        return redirect('admin/categories')->with('success', 'Suppréssion éffectuée avec succès')
                                       ->with(['categories'=>$categories]);
      }
        catch(Exception $x){
          $categories=Category::all();
          return redirect('admin/categories')->with('error', 'Suppréssion échouée')
          ->with(['categories'=>$categories]);;
       
        }
    
    
    }
}
