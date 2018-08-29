@extends('administrator.index')

@section('content')
    <h3>Add header</h3>
    <section>
        <p>Choose file you want to add</p>
        <form method="post" action="{{route('admin.template.add.header.prove')}}" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="PUT">
            <button class="submit" name="save">Dodaj</button>
        </form>
    </section>

@endsection
