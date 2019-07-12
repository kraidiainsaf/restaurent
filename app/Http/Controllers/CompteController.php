<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class CompteController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'min:10','max:10'],
            'address' => ['required', 'string', 'max:255'],
            'cart' => ['required','min:10','max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['string', 'min:8', 'confirmed'],
        ]);
    }
    public function show()
    {
        $id = Auth::user()->id;

      $user = User::find($id);
      
        return view('pages.Compte', ['user' =>$user]);

    }
    public function update(Request $request)
    {
        $id = Auth::user()->id;

      $user = User::find($id);
      $user->name =$request->input('name');
      if($request->input('password')!=null){
        $user->password =Hash::make($request->input('password'));
      }
      $user->prenom =$request->input('prenom');
      $user->nom =$request->input('nom');
      $user->telephone =$request->input('telephone');
      $user->address =$request->input('address');
      $user->email =$request->input('email');
      $user->save();
        return view('pages.Compte', ['user' =>$user]);

    }
}
