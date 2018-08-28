@extends('administrator.index')

@section('content')
    <a href="{{route('admin.template.add.logo')}}">Add logo</a>
    <a href="{{route('admin.template.add.header')}}">Add header</a>
@endsection
