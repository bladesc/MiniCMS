@extends('administrator.index')

@section('content')
    <a href="{{route('admin.template.add.logo')}}">Add logo</a>
    <a href="{{route('admin.template.add.header')}}">Add header</a>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
@endsection
