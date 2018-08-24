@extends('administrator.index')

@section('content')
    <a href="{{route('admin.gallery.add')}}">Dodaj</a>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
@endsection
