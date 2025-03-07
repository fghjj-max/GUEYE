@extends('navbar')

@section('content')
    <div class="container">
        <a class="btn btn-success mt-5" href="{{route('professeur.addProfesseur')}}">Ajouter</a>
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <br>
        <h1>Les Professeurs</h1>
        <table class="table">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Action</th>

            </tr>
            @foreach($professeurs as $e)
                <tr>

                    <td>{{$e->nom_professeur}}</td>
                    <td>{{$e->prenom_professeur}}</td>
                    <td>{{$e->email_professeur}}</td>
                    <td>{{$e->telephone_professeur}}</td>

                    <td class="d-flex gap-3">
                        <a class="btn btn-primary" href="{{route('professeur.editProfesseur',$e->id)}}"><ion-icon name="create-outline"></ion-icon></a>
                        <form action="{{route('professeur.deleteProfesseur',$e->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" ><ion-icon name="trash-outline"></ion-icon></button>
                        </form>
                        <a class="btn btn-success" href="{{route('professeur.showProfesseur',$e->id)}}"><ion-icon name="information-circle-outline"></ion-icon></a>

                    </td>
                </tr>
            @endforeach
        </table>



    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

@endsection
