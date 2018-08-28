@extends('administrator.index')

@section('content')

    <form method="post" action="{{route('admin.template.add.header.prove')}}" enctype="multipart/form-data">
        <input type="file" name="header">
        <button name="save">Dodaj</button>
    </form>

@endsection
