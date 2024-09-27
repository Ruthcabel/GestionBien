@extends('admin.base')
@section('title', $property->exists ? 'Modifier un bien' : 'Creer un bien')

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{route($property->exists ? "admin.property.update" : "admin.property.store", $property)}}" method='POST'>
        @csrf
        @method($property->exists ? 'PATCH' :'POST')
        <div class="row my-3 ">
            <div class="col-9">
                <div class="row">
                    @include('shared.input', ['class' => 'col-6', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])
                    @include('shared.input', ['class' => 'col-3', 'name' => 'surface', 'value' => $property->surface])
                    @include('shared.input', ['class' => 'col-3', 'label' => 'Prix', 'name' => 'price', 'value' => $property->price])
                </div>
                @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description])
                <div class="row">
                    @include('shared.input', ['class' => 'col-4', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
                    @include('shared.input', ['class' => 'col-4', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
                    @include('shared.input', ['class' => 'col-4', 'label' => 'Etages', 'name' => 'floor', 'value' => $property->floor])
                </div>
                <div class="row">
                    @include('shared.input', ['class' => 'col-4', 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
                    @include('shared.input', ['class' => 'col-4', 'label' => 'Ville', 'name' => 'city', 'value' => $property->city])
                    @include('shared.input', ['class' => 'col-4', 'label' => 'Code Postal', 'name' => 'postal_code', 'value' => $property->postal_code])
                </div>
                @include('shared.select', ['label' => 'Options', 'name' => 'options', 'value' => $property->options()->pluck('id'), 'multiple' => true, 'options' => $options])
            </div>
            <div class="col-3">
                @include('shared.checkbox', ['label' => 'Vendu ?', 'name' => 'sold', 'value' => $property->sold])
                <div class="form-group">
                    <label for="inputAddress2">Images</label>
                    <input type="file" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            @if($property->exists) Modifier @else Creer @endif
        </button>
    </form>
@endsection
