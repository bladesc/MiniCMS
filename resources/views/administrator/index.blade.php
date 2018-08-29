@extends('administrator.layout.layout')

@section('page')
<div id="left-bar">
    <div class="head-bar"><h2>Navigation</h2></div>
    <section>
        <ul>
            <li><i class="fas fa-bars"></i><a href="{{route('admin.menu')}}">Menu</a><i class="fas fa-caret-down"></i></li>
            <li><i class="fas fa-project-diagram"></i><a href="{{route('admin.cms')}}">Cms</a><i class="fas fa-caret-down"></i></li>
            <li><i class="far fa-images"></i><a href="{{route('admin.gallery')}}">Gallery</a><i class="fas fa-caret-down"></i></li>
            <li><i class="fas fa-globe"></i><a href="{{route('admin.seo')}}">Seo</a><i class="fas fa-caret-down"></i></li>
            <li><i class="far fa-file-image"></i><a href="{{route('admin.template')}}">Template</a><i class="fas fa-caret-down"></i></li>
            <li><i class="fas fa-signal"></i><a href="{{route('admin.statistics')}}">Statistics</a><i class="fas fa-caret-down"></i></li>
            <li><i class="fas fa-users"></i><a href="{{route('admin.users')}}">Users</a><i class="fas fa-caret-down"></i></li>
            <li><i class="far fa-user"></i><a href="{{route('admin.account')}}">My account</a><i class="fas fa-caret-down"></i></li>
        </ul>
    </section>
</div>

<div id="right-bar">
    <div class="head-bar">
        <div>
            <h2>Dashboard</h2>
        </div>
        <div>
            @guest
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @else

                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="far fa-user"></i> {{ Auth::user()->name }}
                </a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-unlock-alt"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
        <div class="foot-box"></div>
    </div>

    @include('administrator.breadcrumbs')
    <section>
    @yield('content')
        <div class="foot-box"></div>
    </section>
</div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@endsection
