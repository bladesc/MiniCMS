@extends('home.layout.layout')

@section('content')

    @include('home.main.menu')
    @include('home.main.header')
    @include('home.main.slider')
    @include('home.main.about')
    @include('home.main.services')
    @include('home.main.gallery')
    @include('home.main.contact')
    @include('home.main.map')
    @include('home.main.footer')

@endsection
