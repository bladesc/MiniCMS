@extends('administrator.index')

@section('content')
    <h3>Dodaj</h3>
    <section>
        <form method="post" action="{{route('admin.menu.add.prove')}}">
            <input type="text" name="name" placeholder="name" required>
            <input type="text" name="url" placeholder="url" required>
            <label for="visible">Enable visible: </label>
            <input type="checkbox" id="visible" name="visible" checked>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button class="submit">Save</button>
        </form>
        <div class="foot-box"></div>
    </section>
@endsection
