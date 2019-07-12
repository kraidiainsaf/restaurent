<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function show()
    {

      $plats = Produit::where('type','=','plat')->get();
      $boissons = Produit::where('type','=','boisson')->get();
      $supplémentaires = Produit::where('type','=','supplémentaire')->get();
      $client_id=Auth::user()->id;
      $type_commande=null;
      if($client_id==1||$client_id==2||$client_id==3||$client_id==4){
        $type_commande='locale';

      }else{
        $type_commande='web';

      }

        return view('pages.Menu.Menu', ['type_commande' =>$type_commande,'plats' =>$plats,'boissons'=>$boissons,'supplémentaires'=>$supplémentaires]);

    }
}
