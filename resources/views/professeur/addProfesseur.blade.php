@extends('navbar')

@section('content')
    <form action="{{route($professeur->id ? 'professeur.updateProfesseur' :'professeur.saveProfesseur',$professeur->id)}}" method="POST">
        @csrf
        @method($professeur->id ? 'put' : 'post')
        <input name="id" value="{{ $professeur->id  ? $professeur->id : ''}}"  hidden >

        <label>Nom</label>
        <input type="text" name="nom_professeur" class="form-control   @error('nom_professeur') is-invalid  @enderror" value="{{ $professeur->id  ? $professeur->nom_professeur : old('nom_professeur')}}">
        @error('nom_professeur')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <label>Prenom</label>
        <input type="text" name="prenom_professeur" class="form-control  @error('prenom_professeur') is-invalid @enderror" value="{{$professeur->id ? $professeur->prenom_professeur: old('prenom_professeur')}}">
        @error('prenom_professeur')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <label>Email</label>
        <input type="email" name="email_professeur" class="form-control" value="{{$professeur->id ? $professeur->email_professeur : old('email_professeur')}}">

        <label>Telephone</label>
        <textarea name="telephone_professeur" class="form-control" >{{$professeur->id ? $professeur->telephone_professeur: old('telephone_professeur')}}</textarea>

        <button type="submit">{{$professeur->exists ? 'Modifier' : 'Ajouter'}}</button>
    </form>
@endsection
