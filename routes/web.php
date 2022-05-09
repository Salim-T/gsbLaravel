<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

        /*-------------------- Use case connexion---------------------------*/
Route::get('/',[
        'as' => 'chemin_connexion',
        'uses' => 'connexionController@connecter'
]);

Route::post('/',[
        //'as'=>'chemin_valider',
        'uses'=>'connexionController@valider'
]);
Route::get('deconnexion',[
        'as'=>'chemin_deconnexion',
        'uses'=>'connexionController@deconnecter'
]);

         /*-------------------- Use case état des frais---------------------------*/
Route::get('selectionMois',[
        'as'=>'chemin_selectionMois',
        'uses'=>'etatFraisController@selectionnerMois'
]);

Route::post('listeFrais',[
        'as'=>'chemin_listeFrais',
        'uses'=>'etatFraisController@voirFrais'
]);

        /*-------------------- Use case gérer les frais---------------------------*/

Route::get('gererFrais',[
        'as'=>'chemin_gestionFrais',
        'uses'=>'gererFraisController@saisirFrais'
]);

Route::post('sauvegarderFrais',[
        'as'=>'chemin_sauvegardeFrais',
        'uses'=>'gererFraisController@sauvegarderFrais'
]);

Route::get('listeVisiteur',[
        'as'=>'chemin_listeVisiteur',
        'uses'=>'gestionnaireController@listerVisiteurs'
]);


 Route::post('selectionVisiteur',[
         'as'=>'chemin_selectionVisiteur',
         'uses'=>'gestionnaireController@selectionnerLesFraisVisiteurs'
]);

Route::post('archiveVisiteur',[
        'as'=>'chemin_archiveVisiteur',
        'uses'=>'gestionnaireController@archiveVisiteur'
]);


/*------------------------TP1-------------------------------*/

Route::get('test',[
        'as'=>'chemin_test',
        'uses'=>'testController@faireTest'
]);

Route::get('modificationMdp',[
        'as'=>'chemin_modificationMdp',
        'uses'=>'testController@modifierMdp'
]);

Route::post('modificationMdp',[
        // 'as'=>'chemin_modificationMdp',
        'uses'=>'testController@validerMdp'
]);
