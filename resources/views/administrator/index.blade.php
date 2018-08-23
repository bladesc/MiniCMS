@extends('administrator.layout.layout')

@section('page')
<div id="left-bar">
    <h2>Navigation</h2>
    <section>
        <ul>
            <li><i class="fab fa-accessible-icon"></i><a href="{{route('admin.menu')}}">Menu</a><i class="fas fa-caret-down"></i></li>
            <li><i class="fab fa-accessible-icon"></i><a href="{{route('admin.cms')}}">Cms</a><i class="fas fa-caret-down"></i></li>
            <li><i class="fab fa-accessible-icon"></i><a href="{{route('admin.gallery')}}">Galeria</a><i class="fas fa-caret-down"></i></li>
            <li><i class="fab fa-accessible-icon"></i><a href="{{route('admin.seo')}}">Seo</a><i class="fas fa-caret-down"></i></li>
        </ul>
    </section>
</div>
<div id="right-bar">
    <h2>Dashboard</h2>
    <section>
    @yield('content')
    </section>
</div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@endsection
