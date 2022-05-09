<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PdoGsb;

class testController extends Controller
{
    function faireTest(){
        $visiteur = session('visiteur');
        return view('test')
        ->with('visiteur',$visiteur);
    }

    function modifierMdp(){

        $visiteur = session('visiteur');
        return view('modificationMdp')
        ->with('visiteur',$visiteur)
        ->with('erreurs', null);
    }

    function validerMdp(Request $request){//Quand on récupère les données d'un formulaire on utilise la classe Request

        $visiteur = session('visiteur');
        $date = ($request['dateEmbauche']);
        $mdp = ($request['mdp']);
        $newMdp = ($request['newMdp']);
        $dateVisiteur = PdoGsb::getDateEmbauche($visiteur['id']);
        if($mdp == $newMdp && $date == $dateVisiteur){
            $res = PdoGsb::majMdp($mdp,$visiteur['id']);
            $erreur[]="C'est Bon";
        }
        else 
        {
            $erreur[]="C'est pas bon";
        }
        return view('modificationMdp')
        ->with('visiteur',$visiteur)
        ->with('erreurs', $erreur);


    }
    


}
