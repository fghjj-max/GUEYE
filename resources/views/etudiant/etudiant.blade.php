@extends('navbar')

@section('content')
    <div class="container">
        <a class="btn btn-success mt-5" href="{{route('etudiant.addEtudiant')}}">Ajouter</a>
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <br>
        <h1>Les  Etudiants</h1>
        <table class="table">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date</th>
                <th>Classe</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Action</th>

            </tr>
            @foreach($etudiants as $e)
                <tr>

                    <td>{{$e->nom_etudiant}}</td>
                    <td>{{$e->prenom_etudiant}}</td>
                    <td>{{$e->dateNaissance_etudiant}}</td>
                    <td>{{$e->classe->nom_classes ??""}}</td>
                    <td>{{$e->email_etudiant}}</td>
                    <td>{{$e->telephone_etudiant}}</td>

                    <td class="d-flex gap-3">
                        <a class="btn btn-primary" href="{{route('etudiant.editEtudiant',$e->id)}}"><ion-icon name="create-outline"></ion-icon></a>
                        <form action="{{route('etudiant.deleteEtudiant',$e->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" ><ion-icon name="trash-outline"></ion-icon></button>
                        </form>


                    </td>
                </tr>
            @endforeach
        </table>



    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

@endsection
