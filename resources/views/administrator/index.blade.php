@extends('administrator.layout.layout')

@section('page')
<div id="left-bar">
    <div class="head-bar"><h2>Navigation</h2></div>
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
                    {{ Auth::user()->name }}
                </a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
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
    </section>
</div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@endsection
