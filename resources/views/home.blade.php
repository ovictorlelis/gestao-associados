@extends('layouts.app')

@section('content')
    {{-- @guest --}}
    {{-- <livewire:login /> --}}
    {{--  @endguest --}}

    {{-- @auth --}}
    <x-home />
    {{-- @endauth --}}
@endsection
