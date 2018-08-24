@extends('administrator.index')

@section('content')
    <h3>Dodaj</h3>

    <form method="post" action="{{route('admin.gallery.add.category.prove')}}">
        <input type="text" name="name" placeholder="name" required>
        <input type="checkbox" name="visible" checked>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <button>Zapisz</button>
    </form>

@endsection
