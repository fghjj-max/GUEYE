@extends('navbar')

@section('content')
    <form action="{{route($emploie->id ? 'emploie.updateEmploie' :'emploie.saveEmploie',$emploie->id)}}" method="POST">
        @csrf
        @method($emploie->id ? 'put' : 'post')
        <input name="id" value="{{ $emploie->id ? $emploie->id : '' }}" hidden>
        <label>Jour</label>
        <select name="jour" class="form-control @error('jour') is-invalid @enderror">
            <option value="">Sélectionnez un jour</option>
            <option value="Lundi" {{ ($emploie->id && $emploie->jour == 'Lundi') || old('jour') == 'Lundi' ? 'selected' : '' }}>Lundi</option>
            <option value="Mardi" {{ ($emploie->id && $emploie->jour == 'Mardi') || old('jour') == 'Mardi' ? 'selected' : '' }}>Mardi</option>
            <option value="Mercredi" {{ ($emploie->id && $emploie->jour == 'Mercredi') || old('jour') == 'Mercredi' ? 'selected' : '' }}>Mercredi</option>
            <option value="Jeudi" {{ ($emploie->id && $emploie->jour == 'Jeudi') || old('jour') == 'Jeudi' ? 'selected' : '' }}>Jeudi</option>
            <option value="Vendredi" {{ ($emploie->id && $emploie->jour == 'Vendredi') || old('jour') == 'Vendredi' ? 'selected' : '' }}>Vendredi</option>

        </select>
        @error('jour')
        <span class="text-danger">{{ $message }}</span>

        @enderror

        <label for="heureDebut">Heure de début</label>
        <input type="time" name="heureDebut" class="form-control @error('heureDebut') is-invalid @enderror" value="{{ old('heureDebut') }}">
        @error('heureDebut')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="heureFin">Heure de fin</label>
        <input type="time" name="heureFin" class="form-control @error('heureFin') is-invalid @enderror" value="{{ old('heureFin') }}">
        @error('heureFin')
        <span class="text-danger">{{ $message }}</span>
        @enderror


        <button type="submit">{{$emploie->exists ? 'Modifier' : 'Ajouter'}}</button>
    </form>
@endsection
