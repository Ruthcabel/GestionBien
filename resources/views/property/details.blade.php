@extends('base')
@section('title', $property->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="..." alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <h1>{{$property->title}}</h1>
                <h2>{{$property->rooms}} pièces - {{$property->surface}} m²</h2>
                <div class="text-primary fw-bold" style="font-size: 1.4rem">
                    {{number_format($property->price, thousands_separator: ' ')}} Fcfa
                </div>
                <hr>
                @include('shared.flash')
                <h4>Intéressé par ce bien ?</h4>
                <form action="{{route('property.contact', $property)}}" method='POST'>
                    @csrf
                    <div class="row">
                        @include('shared.input', ['class' => 'col-6', 'label' => 'Prénom', 'name' => 'firstname', 'value' => 'john'])
                        @include('shared.input', ['class' => 'col-6', 'label' => 'Nom', 'name' => 'lastname', 'value' => 'doe'])
                    </div>
                    <div class="row">
                        @include('shared.input', ['class' => 'col-6', 'label' => 'Téléphone', 'name' => 'phone', 'value' => '6 59 50 59 53'])
                        @include('shared.input', ['class' => 'col-6', 'label' => 'Email', 'name' => 'email', 'type' => 'email', 'value' => 'john@doepublic.fr'])
                    </div>
                    @include('shared.input', ['class' => 'col', 'label' => 'Votre message', 'name' => 'message', 'type' => 'textarea', 'value' => 'mon message'])

                    <button type="submit" class="btn btn-primary mt-3">Nous Contacter</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <p>{{$property->description}}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-8">
                <h2>Caractéristisques</h2>
                <table class="table table-striped">
                    <tr>
                        <td>Surface habitable</td>
                        <td>{{$property->surface}} m²</td>
                    </tr>
                    <tr>
                        <td>Pièces</td>
                        <td>{{$property->rooms}}</td>
                    <tr>
                        <td>Chambres</td>
                        <td>{{$property->bedrooms}}</td>
                    </tr>
                    <tr>
                        <td>Etages</td>
                        <td>{{$property->floor ?: 'Rez de chaussé'}}</td>
                    </tr>
                    <tr>
                        <td>Localisation</td>
                        <td>{{$property->address}} <br> {{$property->city}} ({{$property->postal_code}})</td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-4">
                <h2>Spécificités</h2>
                <ul class="list-group">
                    @foreach($property->options as $option)
                        <li class="list-group-item">{{$option->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
</div>
@endsection
