@extends('classe.navbar')

@section('content')
    <form action="{{route($classe->id ? 'classe.updateClasse' :'classe.saveClasse',$classe->id)}}" method="POST">
        @csrf
        @method($classe->id ? 'put' : 'post')
        <input name="id" value="{{ $classe->id  ? $classe->id : ''}}"  hidden >
        <label>Nom</label>
        <input type="text" name="nom_classes" class="form-control   @error('nom_classes') is-invalid  @enderror" value="{{ $classe->id  ? $classe->nom_classes : old('nom_classes')}}">
        @error('nom_classes')
        <span class="text-danger">{{$message}}</span>
        @enderror


        <button type="submit">{{$classe->exists ? 'Modifier' : 'Ajouter'}}</button>
    </form>
@endsection
