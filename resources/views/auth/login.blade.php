@extends('auth.base')
@section('title', 'Login')

@section('content')
    @include('shared.flash')
    <div class="card-title"><h1 class="text-center">@yield('title')</h1></div>
    <form action="{{route('auth')}}" method="post">
        @csrf
        @include('shared.input', ['type' => 'email', 'class' => 'col', 'label' => 'Email', 'name' => 'email'])
        @include('shared.input', ['type' => 'password', 'class' => 'col', 'label' => 'Mot de passe', 'name' => 'password'])
        <button class="btn btn-primary mt-3">Se connecter</button>
    </form>
@endsection
