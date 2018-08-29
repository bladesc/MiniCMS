@extends('administrator.index')

@section('content')
    <h3>Add category</h3>
    <section>
        <form method="post" action="{{route('admin.gallery.add.category.prove')}}">
            <input type="text" name="name" placeholder="name" required>
            <label for="visible">Visible</label>
            <input type="checkbox" name="visible" id="visible" checked>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button class="submit">Zapisz</button>
        </form>
    </section>
@endsection
