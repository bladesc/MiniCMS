@extends('administrator.index')

@section('content')
    <h3>Dodaj</h3>

    <form method="post" action="{{route('admin.menu.add.prove')}}">
        <input type="text" name="name" placeholder="name" required>
        <input type="text" name="url" placeholder="url" required>
        <input type="checkbox" name="visible" checked>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <button>Zapisz</button>
    </form>

@endsection
