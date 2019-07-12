<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reservation;
use App\Table;
use App\Client;

use DateTime;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class ReservationController extends Controller
{
   
    public function reserver(ReservationRequest $request)
    {        
        // verifier client est valide ou nn 
        $c=Client::find(Auth::user()->id);
        if($c->etat=='non_valider'){
            return view('pages.Reservation.Reservation')->withErrors(['error'=>'votre compte est invalide  ']);
        }else{

       


        $formated_saved_time1 = new DateTime($request->input('date'));
        $date =date_format($formated_saved_time1, 'Y-m-d H:i:s');
        $is_reserved=Reservation::where('date','=',$date)->get();
        $table_id=null;
        foreach($is_reserved as $rslt)
{
   /*
   ||($rslt->de < $request->input('a') && $request->input('a') <= $rslt->a)
    ||($request->input('de') <= $rslt->de && $rslt->de < $request->input('a'))
    ||($request->input('de') < $rslt->a && $rslt->a <= $request->input('a')
   */
    if(($rslt->de <= $request->input('de') && $request->input('de') < $rslt->a )||($rslt->de < $request->input('a') && $request->input('a') <= $rslt->a)||($request->input('de') <= $rslt->de && $rslt->de < $request->input('a'))||($request->input('de') < $rslt->a && $rslt->a <= $request->input('a')))
    
    {
        $table=Table::all()
        ->where('nbr_place','==',$request->nbr_place)
        ->where('id','!==',$rslt->table_id)
        ->first();
        if($table==null){
           
        $is_reserved="true";
        break;
        }else{
            $table_id=$table->id;
        }
    }

}
        

     if($is_reserved=="true"){
      
        return view('pages.Reservation.Reservation')->withErrors(['error'=>'Vous ne pouvez pas réserver dans cette date et heure']);

     }else{
         if($table_id==null){
            $table=Table::all()
            ->where('nbr_place','==',$request->nbr_place)
            ->first();
         }else{
            $table=Table::all()
            ->where('nbr_place','==',$request->nbr_place)
            ->where('id','==',$table_id)
            ->first();
         }
         if($table==null){
            return view('pages.Reservation.Reservation')->withErrors(['error'=>'pas des tables libre']);

         }
     $id = Auth::user()->id;
     $reservation= new Reservation();
     

      $reservation->table_id =$table->id;
      $reservation->client_id =$id;
      $reservation->de =$request->input('de');
      $reservation->a =$request->input('a');

      $formated_saved_time = new DateTime($request->input('date'));
      $reservation->date =date_format($formated_saved_time, 'Y-m-d H:i:s');
      $reservation->save();
        return view('pages.Reservation.ReservationRslt', ['reservation' =>$reservation]);
    }

    }
    }
}
