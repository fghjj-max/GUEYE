@extends('navbar')

@section('content')
    <div class="container">
        <h2>Assigner un Programme à un Professeur</h2>

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

        <form action="{{ route('empprof.saveEmpprof') }}" method="POST">
            @csrf

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-3">
                <label for="emploie_id" class="form-label">Programme</label>
                <select name="emploie_id" id="emploie_id" class="form-control @error('emploie_id') is-invalid @enderror" required>
                    <option value="">Sélectionner un Programme</option>
                    @foreach($emploies as $emploie)
                        <option value="{{ $emploie->id }}" {{ old('emploie_id') == $emploie->id ? 'selected' : '' }}>
                            {{ $emploie->jour }} {{ $emploie->heureDebut }} {{ $emploie->heureFin }}
                        </option>
                    @endforeach
                </select>
                @error('emploie_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="professeur_id" class="form-label">Liste des Professeurs</label>
                <select name="professeur_id" id="professeur_id" class="form-control @error('professeur_id') is-invalid @enderror" required>
                    <option value="">Sélectionner un Professeur</option>
                    @foreach($professeurs as $professeur)
                        <option value="{{ $professeur->id }}" {{ old('professeur_id') == $professeur->id ? 'selected' : '' }}>
                            {{ $professeur->prenom_professeur }} {{ $professeur->nom_professeur }}
                        </option>
                    @endforeach
                </select>
                @error('professeur_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Assigner</button>
        </form>
    </div>
@endsection
