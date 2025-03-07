@extends('navbar')

@section('content')

    <article>

        <h1>  Nom:{{$ev->nom_professeur}} </h1><br>

        <p >

            <strong> Description :</strong>

            {{$ev->prenom_professeur}}
        </p>

        <p >

            <strong> Email :</strong>

            {{$ev->email_professeur}}
        </p>

        <p >

            <strong> Telephone:</strong>

            {{$ev->telephone_professeur}}
        </p>
        <p >




        </p>






    </article>



@endsection
