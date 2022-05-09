<?php

namespace App\Http\Controllers;

use PdoGsb;
use Illuminate\Http\Request;

class gestionnaireController extends Controller
{
    function listerVisiteurs(){
        if(session('gestionnaire') != null){
            $gestionnaire = session('gestionnaire');
            $lesVisiteurs = PdoGsb::getVisiteur();
            $leVisiteur = " ";
		    // Liste les visiteurs
            return view('listeVisiteur')
                        ->with('lesVisiteurs', $lesVisiteurs)
                        ->with('gestionnaire', $gestionnaire)
                        ->with('leVisiteur', $leVisiteur);
        }
        else{
            return view('connexion')->with('erreurs',null);
        }
    }

    function selectionnerLesFraisVisiteurs(Request $request){
        if(session('gestionnaire') != null){
            $gestionnaire = session('gestionnaire');
            $lesVisiteurs = PdoGsb::getVisiteur();
            $visiteur=$request['Visiteur'];
            session(['idVisiteur' => $visiteur]);
            $identite = PdoGsb::getNomVisiteur($visiteur);
            $visiteurFichesFrais=PdoGsb::getLesFichesFraisVisiteur($visiteur);
            $ligneFraisForfait = PdoGsb::selectionnelignefraisforfait($visiteur);
            return view('nombreFicheFrais')
            ->with('gestionnaire',$gestionnaire)
            ->with('lesVisiteurs',$lesVisiteurs)
            ->with('identite',$identite)
            ->with('leVisiteur',$visiteur)
            ->with('visiteurFichesFrais',$visiteurFichesFrais)
            ->with('lignefraisforfait',$ligneFraisForfait);
        }
    }

    function archiveVisiteur(){
        if(session('gestionnaire') != null){
            $gestionnaire = session('gestionnaire'); 
            $idVisiteur = session('idVisiteur');
            $ligneFraisHorsForfaitArchives = PdoGsb::getInfosLigneFraisHorsForfaitArchive($idVisiteur);
            foreach($ligneFraisHorsForfaitArchives as $uneLigneFraisHorsForfait)
            {
                PdoGsb::archiverLignesFraisHorsForfait($uneLigneFraisHorsForfait['id'],$uneLigneFraisHorsForfait['idVisiteur'],$uneLigneFraisHorsForfait['mois'],$uneLigneFraisHorsForfait['libelle'],$uneLigneFraisHorsForfait['date'],$uneLigneFraisHorsForfait['montant']);
                PdoGsb::supprimerLigneFraisHorsForfaits($uneLigneFraisHorsForfait['idVisiteur']);
            }
            $ligneFraisForfaitArchives = PdoGsb::getInfosLigneFraisForfaitArchive($idVisiteur);
            foreach($ligneFraisForfaitArchives as $uneLigneFraisForfait)
            {
                PdoGsb::archiverLignesFraisForfait($uneLigneFraisForfait['idVisiteur'],$uneLigneFraisForfait['mois'],$uneLigneFraisForfait['idFraisForfait'],$uneLigneFraisForfait['quantite']);
                PdoGsb::supprimerLigneFraisForfaits($uneLigneFraisForfait['idVisiteur']);
            }
            $fichesFraisArchives = PdoGsb::getInfosFichesFraisArchive($idVisiteur);
            foreach($fichesFraisArchives as $uneFicheFrais)
            {
                PdoGsb::archiverFichesFrais($uneFicheFrais['idVisiteur'],$uneFicheFrais['mois'],$uneFicheFrais['nbJustificatifs'],
                $uneFicheFrais['montantValide'],
                $uneFicheFrais['dateModif'],$uneFicheFrais['idEtat']);
                PdoGsb::supprimerFichesFrais($uneFicheFrais['idVisiteur']);
            }
            $infoVisiteur = PdoGsb::getInfosVisiteurArchive($idVisiteur);
            $leVisiteur = "";
            $idVisi=$infoVisiteur['id'];
            $nomVisi=$infoVisiteur['nom'];
            $prenomVisi=$infoVisiteur['prenom'];
            $loginVisi = $infoVisiteur['login'];
            $mdpVisi = $infoVisiteur['mdp'];
            $adresseVisi = $infoVisiteur['adresse'];
            $cpVisi = $infoVisiteur['cp'];
            $villeVisi = $infoVisiteur['ville'];
            $datEmbaucheVisi = $infoVisiteur['dateEmbauche'];
            PdoGsb::archiverVisiteur($idVisi,$nomVisi,$prenomVisi,$loginVisi,$mdpVisi,$adresseVisi,$cpVisi,$villeVisi,$datEmbaucheVisi);   
            PdoGsb::supprimerVisiteur($idVisiteur);
            $identite = PdoGsb::getNomVisiteur($idVisiteur );
            $lesVisiteurs = PdoGsb::getVisiteur();
            return view('listeVisiteur')
                        ->with('gestionnaire',$gestionnaire)
                        ->with('leVisiteur',$leVisiteur)
                        ->with('lesVisiteurs', $lesVisiteurs)
                        ->with('identite', $identite)
                        ->with('idVisiteur ',$idVisiteur);
    }
//insert into visiteur values(1,'nom','prenom','log','mdpror','kkljsdjg',74,'kdsjlkgf','2022-12-12')
  }
}
