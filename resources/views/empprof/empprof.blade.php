@extends('navbar')

@section('content')
    <div class="container">
        <a class="btn btn-success mt-5" href="{{ route('empprof.addEmpprof') }}">Ajouter</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <br>
        <h1>Programe des Professeurs</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Programme</th>
                <th>Professeur</th>

            </tr>
            </thead>
            <tbody>
            @foreach($emploies as $emploie)
                @foreach($emploie->professeurs as $prof)
                    <tr>
                        <td>{{ $emploie->jour }} {{ $emploie->heureDebut }} {{ $emploie->heureFin}}</td>
                        <td>{{ $prof->nom_professeur }} {{ $prof->prenom_professeur }}</td>

                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
