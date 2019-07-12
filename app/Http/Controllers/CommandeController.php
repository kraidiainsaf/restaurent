<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\User;
use App\Client;
use Illuminate\Support\Facades\Auth;
use App\Produit;
use App\Table;

use App\Commande_Produit;
use App\Locale_commande;
use App\Web_commande;
use App\Commande;

use App\Ticket;


use Illuminate\Http\Request;

class CommandeController extends Controller
{
    protected function show($id)
    {   $type_commande=null;        $client_id=Auth::user()->id;

        if($client_id==1||$client_id==2||$client_id==3||$client_id==4){
          $type_commande='locale';
  
        }else{
          $type_commande='web';
  
        }
        $plats = Produit::where('type','=','plat')->get();
        $boissons = Produit::where('type','=','boisson')->get();
        $supplémentaires = Produit::where('type','=','supplémentaire')->get();
        $commande=Commande::find($id);
        return view('pages.Menu.Menu_Modifier', ['commande'=>$commande,'type_commande' =>$type_commande,'plats' =>$plats,'boissons'=>$boissons,'supplémentaires'=>$supplémentaires]);



    
    }
    protected function detail()
    {     $client_id=Auth::user()->id;
        $type_commande=null;
        if($client_id==1||$client_id==2||$client_id==3||$client_id==4){
          $type_commande='locale';
  
        }else{
          $type_commande='web';
  
        }
        return view('pages.Menu.MenuRslt2',['type_commande' =>$type_commande]);

    }
    protected function delete($id)
    {           $client_id=Auth::user()->id;

        $commande=Commande::find($id);
        $type_commande=null;
        if($client_id==1||$client_id==2||$client_id==3||$client_id==4){
          $type_commande='locale';
  
        }else{
          $type_commande='web';
  
        }
        $plats = Produit::where('type','=','plat')->get();
        $boissons = Produit::where('type','=','boisson')->get();
        $supplémentaires = Produit::where('type','=','supplémentaire')->get();
       
        $commande->delete();
        if($type_commande == 'locale'){
                      
        $locale_commande=Locale_commande::find($id);
        $locale_commande->delete();
       
            $table=Table::find(Auth::user()->id);
             $table->etat=='libre';
             $table->save();
               
      



        }else{
            $web_commande=Web_commande::find($id);
            $web_commande->delete();
        }
        $commande->ticket->delete();
        foreach( $commande->produits as $p){
                      $p->pivot->update(['deleted_at' => Carbon::now()]);

          }

  $client=Client::find(Auth::user()->id);
        $client->nbr_commande=$client->nbr_commande-1;
        $client->save();

        return view('pages.Menu.Menu', ['type_commande' =>$type_commande,'plats' =>$plats,'boissons'=>$boissons,'supplémentaires'=>$supplémentaires])->withErrors(['error'=>'Votre commande est supprimer choisir au neveau']);

       

    }
    protected function update(Request $data,$id)
    {         $commande=Commande::find($id);
        $client_id=Auth::user()->id;
        $type_commande=null;
        if($client_id==1||$client_id==2||$client_id==3||$client_id==4){
          $type_commande='locale';
  
        }else{
          $type_commande='web';
  
        }
        $plats = Produit::where('type','=','plat')->get();
        $boissons = Produit::where('type','=','boisson')->get();
        $supplémentaires = Produit::where('type','=','supplémentaire')->get();
      
          
            $aumoi_one_selected=false;
            $co = 1;
            while ($co<=count($supplémentaires)) {
                if($data->input('supplémentaire-'.$co)!==null){
                    $aumoi_one_selected=true;
                }
           $co++;
               }    
               $co2 = 1;
               while ($co2<=count($plats)) {
                   if($data->input('plat-'.$co2)!==null){
                       $aumoi_one_selected=true;
                   }
              $co2++;
                  }    
                  $co3 = 1;
                  while ($co3<=count($boissons)) {
                      if($data->input('boisson-'.$co3)!==null){
                          $aumoi_one_selected=true;
                      }
                 $co3++;
                     }    
                     if($aumoi_one_selected==false){
                        return view('pages.Menu.Menu', ['type_commande' =>$type_commande,'plats' =>$plats,'boissons'=>$boissons,'supplémentaires'=>$supplémentaires])->withErrors(['error'=>'Erreur: Sélectionner au moins un produit pour effectuer une commande']);
    
                     }
                    
                     $commande->specification=$data->input('specification');
                     $commande->save();
                     if($type_commande == 'locale'){
                              
                        $locale_commande=Locale_commande::find($id);
                         $locale_commande->order_servie=$data->input('order_servie');
                         $locale_commande->save();
                      
                     }else{
                        $web_commande=Web_commande::find($id);
    
                         $web_commande->id=$commande->id;
                         $web_commande->address=$data->input('address');
                         $web_commande->save();
                         
             
                     }
                    
                     foreach( $commande->produits as $p){
                      $p->pivot->delete();
    
                      
                     }
                    
                     $prix_total=0;
                     //plat
                             $number = 1;
                     
                             while ($number<=count($plats)) {
                                 if($data->input('plat-'.$number)!==null){
                                 $plat_id=$data->input('plat-'.$number);
                                 $plt=Produit::find($plat_id);
                                 $plt_p=$plt->prix;
                                 $plat_q=$data->input('plat-q-'.$number);
                                 $prix_total=$prix_total+$plt_p*$plat_q;
                                 $commande->produits()->attach($plat_id, array('quantité' => $plat_q)); 
                                 }
                            $number++;
                                }
                     //boisson
                                $number2 = 1;
                     
                                while ($number2<=count($boissons)) {
                                    if($data->input('boisson-'.$number2)!==null){
                                    $boisson_id=$data->input('boisson-'.$number2);
                                    $boisson=Produit::find($boisson_id);
                                    $boisson_p=$boisson->prix;
                                    $boisson_q=$data->input('boisson-q-'.$number2);
                                    $prix_total=$prix_total+$boisson_p*$boisson_q;
                                    $commande->produits()->attach($boisson_id, array('quantité' => $boisson_q)); 
                                    }
                               $number2++;
                                   }
                       // supp
                       $number3 = 1;
                     
                       while ($number3<=count($supplémentaires)) {
                           if($data->input('supplémentaire-'.$number3)!==null){
                           $supplémentaire_id=$data->input('supplémentaire-'.$number3);
                           $supplémentaire=Produit::find($supplémentaire_id);
                           $supplémentaire_p=$supplémentaire->prix;
                           $supplémentaire_q=$data->input('supplémentaire-q-'.$number3);
                           $prix_total=$prix_total+$supplémentaire_p*$supplémentaire_q;
                           $commande->produits()->attach($supplémentaire_id, array('quantité' => $supplémentaire_q)); 
                           }
                      $number3++;
                          }     
                          $ticket=Ticket::find($commande->ticket->id);
                          if($type_commande=='locale'){
                           $ticket->prix_totale=$prix_total;
               
                          }else{
                           $ticket->prix_totale=$prix_total+25.00;
                          }
                          $ticket->save();
                       
                          return view('pages.Menu.MenuRslt', ['type_commande'=>$type_commande,'commande' =>$commande,'ticket'=>$ticket]);
           

    }
    protected function commander(Request $data)
    {
        $client_id=Auth::user()->id;
        $type_commande=null;
        if($client_id==1||$client_id==2||$client_id==3||$client_id==4){
          $type_commande='locale';
  
        }else{
          $type_commande='web';
  
        }
        $plats = Produit::where('type','=','plat')->get();
        $boissons = Produit::where('type','=','boisson')->get();
        $supplémentaires = Produit::where('type','=','supplémentaire')->get();
        $aumoi_one_selected=false;
        $co = 1;
        while ($co<=count($supplémentaires)) {
            if($data->input('supplémentaire-'.$co)!==null){
                $aumoi_one_selected=true;
            }
       $co++;
           }    
           $co2 = 1;
           while ($co2<=count($plats)) {
               if($data->input('plat-'.$co2)!==null){
                   $aumoi_one_selected=true;
               }
          $co2++;
              }    
              $co3 = 1;
              while ($co3<=count($boissons)) {
                  if($data->input('boisson-'.$co3)!==null){
                      $aumoi_one_selected=true;
                  }
             $co3++;
                 }    
                 if($aumoi_one_selected==false){
                    return view('pages.Menu.Menu', ['type_commande' =>$type_commande,'plats' =>$plats,'boissons'=>$boissons,'supplémentaires'=>$supplémentaires])->withErrors(['error'=>'Erreur: Sélectionner au moins un produit pour effectuer une commande']);

                 }

        $c=Client::find(Auth::user()->id);
        if($c->etat=='non_valider'){
            return view('pages.Menu.Menu', ['type_commande' =>$type_commande,'plats' =>$plats,'boissons'=>$boissons,'supplémentaires'=>$supplémentaires])->withErrors(['error'=>'votre compte est invalide  ']);

        }else{
           
            if($type_commande == 'locale'){
                $table=Table::find(Auth::user()->id);
                if( $table->etat=='occupée'){
                    return view('pages.Menu.Menu', ['type_commande' =>$type_commande,'plats' =>$plats,'boissons'=>$boissons,'supplémentaires'=>$supplémentaires])->withErrors(['error'=>'la commande précédente n"est pas encore été payée ']);

                }
              
            }
           
           

        $commande=new Commande;
        $commande->specification=$data->input('specification');
        $commande->etat='non_valider';
        $commande->client_id=Auth::user()->id;
        $commande->save();
        if($type_commande == 'locale'){
            $locale_commande=new Locale_commande;
            $locale_commande->id=$commande->id;
            $locale_commande->order_servie=$data->input('order_servie');
            $locale_commande->save();
            $table=Table::find(Auth::user()->id);
            $table->etat='occupée';
            $table->save();


        }else{
            $web_commande=new Web_commande;
            $web_commande->id=$commande->id;
            $web_commande->address=$data->input('address');
            $web_commande->save();
            

        }
        $client=Client::find(Auth::user()->id);
        $client->nbr_commande=$client->nbr_commande+1;
        $client->save();

        $prix_total=0;
//plat
        $number = 1;

        while ($number<=count($plats)) {
            if($data->input('plat-'.$number)!==null){
            $plat_id=$data->input('plat-'.$number);
            $plt=Produit::find($plat_id);
            $plt_p=$plt->prix;
            $plat_q=$data->input('plat-q-'.$number);
            $prix_total=$prix_total+$plt_p*$plat_q;
            $commande->produits()->attach($plat_id, array('quantité' => $plat_q)); 
            }
       $number++;
           }
//boisson
           $number2 = 1;

           while ($number2<=count($boissons)) {
               if($data->input('boisson-'.$number2)!==null){
               $boisson_id=$data->input('boisson-'.$number2);
               $boisson=Produit::find($boisson_id);
               $boisson_p=$boisson->prix;
               $boisson_q=$data->input('boisson-q-'.$number2);
               $prix_total=$prix_total+$boisson_p*$boisson_q;
               $commande->produits()->attach($boisson_id, array('quantité' => $boisson_q)); 
               }
          $number2++;
              }
  // supp
  $number3 = 1;

  while ($number3<=count($supplémentaires)) {
      if($data->input('supplémentaire-'.$number3)!==null){
      $supplémentaire_id=$data->input('supplémentaire-'.$number3);
      $supplémentaire=Produit::find($supplémentaire_id);
      $supplémentaire_p=$supplémentaire->prix;
      $supplémentaire_q=$data->input('supplémentaire-q-'.$number3);
      $prix_total=$prix_total+$supplémentaire_p*$supplémentaire_q;
      $commande->produits()->attach($supplémentaire_id, array('quantité' => $supplémentaire_q)); 
      }
 $number3++;
     }         

           $ticket=new Ticket;
           if($type_commande=='locale'){
            $ticket->prix_totale=$prix_total;
            $ticket->type="locale";

           }else{
            $ticket->prix_totale=$prix_total+25.00;
            $ticket->type="facture";

           }
           $ticket->save();
           $commande2=Commande::find($commande->id);
           $commande2->ticket_id=$ticket->id;
           $commande2->save();
           $obj=new CommandeController();
          return $this->gotoo($commande2->id);

        }
       

    }
    public function gotoo($id)
    {
      
        $commande2=Commande::find($id);
        return view('pages.Menu.MenuRslt', ['commande' =>$commande2]);

    }
}
