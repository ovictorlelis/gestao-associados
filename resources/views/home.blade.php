@extends('layouts.app')

@section('content')
    @guest
        <livewire:login />
    @endguest

    @auth
        <h1>Home</h1>
    @endauth
@endsection
