@extends('base')
@section('title', 'Tous nos biens')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="Budget max" class="form-control" name="price" value="{{$input['price'] ?? ''}}}">
            <input type="number" placeholder="Surface min" class="form-control" name="surface" value="{{$input['surface'] ?? ''}}}">
            <input type="number" placeholder="Nombre de pièces min" class="form-control" name="rooms" value="{{$input['rooms'] ?? ''}}}">
            <input placeholder="Mots cléf" class="form-control" name="title" value="{{$input['title'] ?? ''}}">
            <button class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
        </form>
    </div>
    <div class="container">
        <h2>@yield('title')</h2>
        <div class="row mb-3">
            @forelse($properties as $property)
                <div class="col-3 mb-4">
                    @include('shared.card')
                </div>
            @empty
                <div class="col text-center mt-5">
                    <h5>Aucun ne correspond a votre récherche</h5>
                </div>
            @endforelse
        </div>
        {{$properties->links()}}
    </div>
@endsection
