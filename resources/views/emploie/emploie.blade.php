@extends('navbar')

@section('content')
    <div class="container">
        <a class="btn btn-success mt-5" href="{{route('emploie.addEmploie')}}">Ajouter</a>
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <br>
        <table class="table ">
            <tr>
                <th>Jour</th>
                <th>Heure Debut</th>
                <th>Heure Fin </th>

                <th>Action</th>

            </tr>
            @foreach($emploies as $e)
                <tr>

                    <td>{{$e->jour}}</td>
                    <td>{{$e->heureDebut}}</td>
                    <td>{{$e->heureFin}}</td>
                    <td class="d-flex gap-3">
                        <a class="btn btn-primary" href="{{route('emploie.editEmploie',$e->id)}}"><ion-icon name="create-outline"></ion-icon></a>
                        <form action="{{route('emploie.deleteEmploie',$e->id)}}" method="POST">
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
