@extends('navbar')

@section('content')
    <form action="{{route($classe->id ? 'updateClasse' :'saveClasse',$classe->id)}}" method="POST">
        @csrf
        @method($classe->id ? 'put' : 'post')
        <input name="id" value="{{ $classe->id  ? $classe->id : ''}}"  hidden >
        <label>Nom</label>
        <input type="text" name="nom_classe" class="form-control   @error('nom_classe') is-invalid  @enderror" value="{{ $classe->id  ? $classe->libelle : old('nom_classe')}}">
        @error('nom_classe')
        <span class="text-danger">{{$message}}</span>
        @enderror


        <button type="submit">{{$classe->exists ? 'Modifier' : 'Ajouter'}}</button>
    </form>
@endsection
