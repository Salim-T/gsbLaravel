@extends ('sommaireGestionnaire')
    @section('contenu1')
      <div id="contenu">
        <h2>Liste des visiteurs</h2>
        <h3>Visiteurs à séléctionner</h3>
      <form action="{{ route('chemin_selectionVisiteur')}}" method="post">
        {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        <div class="corpsForm"><p>
          <label for="lstVisiteur" >Visiteurs :</label>
          <select id="lstMois" name="Visiteur">
              @foreach($lesVisiteurs as $visiteur)
                  @if ($visiteur['identite'] == $leVisiteur)
                    <option selected value="{{ $visiteur['id'] }}">
                      {{ $visiteur['identite'] }} 
                    </option>
                  @else 
                    <option value="{{ $visiteur['id'] }}">
                      {{ $visiteur['identite'] }} 
                    </option>
                  @endif
              @endforeach
          </select>
        </p>
        </div>
        <div class="piedForm">
        <p>
          <input id="ok" type="submit" value="Valider" size="20" />
          <input id="annuler" type="reset" value="Effacer" size="20" />
        </p> 
        </div>
          
        </form>
  @endsection 
 