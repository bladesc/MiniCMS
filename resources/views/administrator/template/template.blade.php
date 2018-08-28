@extends('administrator.index')

@section('content')
    <a class="new right" href="{{route('admin.template.add.logo')}}">Add logo <i class="far fa-plus-square"></i></a>
    <a class="new right" href="{{route('admin.template.add.header')}}">Add header <i class="far fa-plus-square"></i></a>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="foot-box"></div>
@endsection
