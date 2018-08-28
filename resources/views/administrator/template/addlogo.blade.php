@extends('administrator.index')

@section('content')
    <form method="post" action="{{route('admin.template.add.logo.prove')}}" enctype="multipart/form-data">
        <input type="file" name="logo">
        <button name="save">Dodaj</button>
    </form>
@endsection
