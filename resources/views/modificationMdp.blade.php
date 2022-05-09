@extends ('sommaire')
@section('contenu1')
<div id = "contenu">
    <h2>Changement de mot de passe</h2>
    <form method = "post" action = "">
        {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        @includeWhen($erreurs != null , 'msgerreurs', ['erreurs' => $erreurs]) 
        <p>
        <label for ="dateEmbauche">Date d'embauche</label>
        <input id ="datedEmbauche" type = "date" name = "dateEmbauche"  size = "30" maxlength = "45" required >
        </p>
        <p>
        <label for = "mdp">Entrer le nouveau mot de passe</label>
        <input id = "mdp"  type = "password"  name = "mdp" size = "30" maxlength = "45" required>
        </p>
        <p>
        <label for = "newMdp">Confirmer le nouveau mot de passe</label>
        <input id = "nwMdp"  type = "password"  name = "newMdp" size = "30" maxlength = "45" required>
        </p>
       <input type = "submit" value = "Valider" name = "valider">
       <input type = "reset" value = "Annuler" name = "annuler"> 
        </p>
    </form>
</div>
@endsection