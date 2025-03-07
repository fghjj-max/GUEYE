@extends('navbar')

@section('content')
    <div class="container">
        <h2>Assigner un Programme à une Classe</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('empclasse.saveEmpclasse') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="emploie_id" class="form-label">Programmes</label>
                <select name="emploie_id" id="emploie_id" class="form-control" required>
                    <option value="">Sélectionner un Programe</option>
                    @foreach($emploies as $emploie)
                        <option value="{{ $emploie->id }}">
                            {{ $emploie->jour }} {{ $emploie->heureDebut }} {{ $emploie->heureFin}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="classe_id" class="form-label">Liste des Classes</label>
                <select name="classe_id" id="classe_id" class="form-control" required>
                    <option value="">Sélectionner une classe</option>
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}">
                            {{ $classe->nom_classes }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Assigner</button>

        </form>
    </div>
@endsection
