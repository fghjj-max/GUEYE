@extends('navbar')

@section('content')
    <div class="container">
        <a class="btn btn-success mt-5" href="{{ route('profclasse.addProfclasse') }}">Ajouter</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <br>
        <h1>Professeurs et leurs Classes</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Professeur</th>
                <th>Classe</th>

            </tr>
            </thead>
            <tbody>
            @foreach($professeurs as $professeur)
                @foreach($professeur->classes as $classe)
                    <tr>
                        <td>{{ $professeur->nom_professeur }} {{ $professeur->prenom_professeur }}</td>
                        <td>{{ $classe->nom_classes }}</td>
                        <td>
                            <!-- Colonne Action vide pour l'instant puisque vous n'avez pas besoin de la suppression -->
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
