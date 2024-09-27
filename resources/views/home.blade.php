@extends('base')
@section('title', 'Accueil')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>My First Bootstrap Page</h1>
            <p> Resize this responsive page to see the effect! Resize this responsive page to see the effect! Resize this responsive page to see the effect!
                Resize this responsive page to see the effect! Resize this responsive page to see the effect! Resize this responsive page to see the effect!</p>
        </div>
    </div>
    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach($properties as $property)
                <div class="col">
                    @include('shared.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
