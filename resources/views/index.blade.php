@extends('navbar')

@section('content')
    <div class="container d-flex align-items-center justify-content-between mt-1" style="height: 100vh;">
        <div class="text-left">
            <h1>Notre réussite</h1>
            <h1> notre credo</h1>
            <p>Le Meilleur en Domaine des TIC.</p>
        </div>
        <div class="text-right">
            <img src="{{ asset('image/images.jpeg') }}" alt="Notre réussite" class="img-fluid" style="max-width: 300px;">
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
@endsection
