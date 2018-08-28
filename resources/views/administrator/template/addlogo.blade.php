@extends('administrator.index')

@section('content')
    <form method="post" action="{{route('admin.template.add.logo.prove')}}" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="PUT">
        <button name="save">Dodaj</button>
    </form>
@endsection
