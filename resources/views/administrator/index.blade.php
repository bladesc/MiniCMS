@extends('administrator.layout.layout')

@section('page')
<div id="left-bar">
    <h2>Navigation</h2>
    <section>
        <ul>
            <li><a href="{{route('admin.menu')}}">Menu</a></li>
            <li><a href="{{route('admin.cms')}}">Cms</a></li>
            <li><a href="{{route('admin.gallery')}}">Galeria</a></li>
            <li><a href="{{route('admin.seo')}}">Seo</a></li>
        </ul>
    </section>
</div>
<div id="right-bar">
    <h2>Dashboard</h2>
    <section>
    @yield('content')
    </section>
</div>
@endsection