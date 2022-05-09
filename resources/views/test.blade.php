@extends ('sommaire')
    @section('contenu1')

    <h2>Bonjour {{ $visiteur['nom'] . ' ' . $visiteur['prenom'] }}</h2>

@endsection