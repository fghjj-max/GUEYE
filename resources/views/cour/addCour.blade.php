@extends('navbar')

@section('content')
    <form action="{{route($cour->id ? 'cour.updateCour' :'cour.saveCour',$cour->id)}}" method="POST">
        @csrf
        @method($cour->id ? 'put' : 'post')
        <input name="id" value="{{ $cour->id  ? $cour->id : ''}}"  hidden >
        <label>Nom</label>
        <input type="text" name="nom_cours" class="form-control   @error('nom_cours') is-invalid  @enderror" value="{{ $cour->id  ? $cour->nom_cours : old('nom_cour')}}">
        @error('nom_cours')
        <span class="text-danger">{{$message}}</span>
        @enderror


        <button type="submit">{{$cour->exists ? 'Modifier' : 'Ajouter'}}</button>
    </form>
@endsection
