<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function show_create()
    {
      return view('admin/users/create');
    }
  
    public function create(Request $req)
    {
        try {

          $req->validate(
            [
              "username"=>"required|unique:users",
              "email"=>"required|unique:users|email",
              "password"=>['required','min:6'],
            ]);

            User::create([
            'username' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'created_at' => now()
  
          ]);
  
          return back()->with('success', 'Ajout éffectué avec succès');
        } catch (Exception $x) {
          return back()->with('error', "Echec de l\'ajout $x");
        }
    }
  
    public function show_edit(int $id)
    {
      $user = User::where('id', $id)->first();
      return view('admin/users/edit', compact('user'));
    }

    public function show_edit_password(int $id)
    {
      $user = User::where('id', $id)->first();
      return view('admin/users/edit_password', compact('user'));
    }

    public function edit_password(Request $req)
    {
      try {

        $req->validate(
          [
            "password"=>"required|min:6",
            "password_confirmation"=>"required|min:6",
          ]);

           User::where('email',$req->email)->update([
            'password' => bcrypt($req->password),
            'updated_at' => now()

        ]);

        return back()->with('success', 'Mise à jour éffectuée avec succès');
      } catch (Exception $x) {
        return back()->with('error', 'Echec de la mise à jour');
      }

    }
  
    public function edit(Request $req, int $id)
    {
      try {

        $req->validate(
          [
            "username"=>"required|unique:users",
            "email"=>"required|unique:users|email",
          ]);

           User::where('id',$id)->update([
            'username' => $req->name,
            'email' => $req->email,
            'created_at' => now()

        ]);

        return back()->with('success', 'Mise à jour éffectuée avec succès');
      } catch (Exception $x) {
        return back()->with('error', 'Echec de la mise à jour');
      }

    }
  
    public function show_delete(int $id)
    {
      $user = User::where('id', $id)->first();
      return view('admin/users/delete', compact('user'));
    }
  
    public function delete(int $id)
    { 
        try{
          
        $user=User::where('id',$id)->delete();

        $users=User::all();
        return redirect('admin/users')->with('success', 'Suppréssion éffectuée avec succès')
                                       ->with(['users'=>$users]);
      }
        catch(Exception $x){
          $users=User::all();
          return redirect('admin/users')->with('error', 'Suppréssion échouée')
          ->with(['users'=>$users]);;
       
        }
    
    
    }
}
