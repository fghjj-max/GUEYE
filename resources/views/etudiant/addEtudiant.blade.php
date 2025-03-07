@extends('navbar')

@section('content')
    <form action="{{route($etudiant->id ? 'etudiant.updateEtudiant' :'etudiant.saveEtudiant',$etudiant->id)}}" method="POST">
        @csrf
        @method($etudiant->id ? 'put' : 'post')
        <input name="id" value="{{ $etudiant->id  ? $etudiant->id : ''}}"  hidden >

        <label>Nom</label>
        <input type="text" name="nom_etudiant" class="form-control   @error('nom_etudiant') is-invalid  @enderror" value="{{ $etudiant->id  ? $etudiant->nom_etudiant: old('nom_etudiant')}}">
        @error('nom_etudiant')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <label>Prenom</label>
        <input type="text" name="prenom_etudiant" class="form-control  @error('prenom_etudiant') is-invalid @enderror" value="{{$etudiant->id ? $etudiant->prenom_etudiant: old('prenom_etudiant')}}">
        @error('prenom_etudiant')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <label>Date</label>
        <input type="date" name="dateNaissance_etudiant" class="form-control" value="{{$etudiant->id ? $etudiant->dateNaissance_etudiant : old('dateNaissance_etudiant')}}">

        <label>Liste des Classe</label>
        <select name="nom_classes" class="form-control">
            @foreach($classes as $e)
                <option value="{{$e->id}}">{{$e->nom_classes}}</option>

            @endforeach
        </select>

        <label>Email</label>
        <input type="text" name="email_etudiant" class="form-control" value="{{$etudiant->id ? $etudiant->email_etudiant : old('email_etudiant')}}">

        <label>Telephone</label>
        <textarea name="telephone_etudiant" class="form-control" >{{$etudiant->id ? $etudiant->telephone_etudiant: old('telephone_etudiant')}}</textarea>

        <button type="submit">{{$etudiant->exists ? 'Modifier' : 'Ajouter'}}</button>
    </form>
@endsection
