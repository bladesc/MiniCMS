@extends('administrator.index')

@section('content')
    <h3>Add item</h3>
    <section>
        <p>Choose file you want to add</p>
        <form method="post" action="{{route('admin.template.add.item.prove')}}" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="hidden" name="itemType" required value="{{$itemType}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="PUT">
            <button class="submit" name="save">Add item</button>
        </form>
    </section>

@endsection
