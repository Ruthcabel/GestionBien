@extends('admin.base')
@section('title', $option->exists ? 'Modifier une option' : 'Creer une option')

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{route($option->exists ? "admin.option.update" : "admin.option.store", $option)}}" method='POST'>
        @csrf
        @method($option->exists ? 'PATCH' :'POST')
        @include('shared.input', ['label' => 'Nom', 'name' => 'name', 'value' => $option->name])
        <button type="submit" class="btn btn-primary mt-3">
            @if($option->exists) Modifier @else Creer @endif
        </button>
    </form>
@endsection
