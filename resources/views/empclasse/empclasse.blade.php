@extends('navbar')

@section('content')
    <div class="container">
        <a class="btn btn-success mt-5" href="{{ route('empclasse.addEmpclasse') }}">Ajouter</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <br>
        <h1>Programmes  des Classes</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Programme</th>
                <th>Classe</th>

            </tr>
            </thead>
            <tbody>
            @foreach($emploies as $emploie)
                @foreach($emploie->classes as $classe)
                    <tr>
                        <td>{{ $emploie->jour }} {{ $emploie->heureDebut }} {{ $emploie->heureFin}}</td>
                        <td>{{ $classe->nom_classes }}</td>

                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
