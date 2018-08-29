@extends('administrator.index')

@section('content')
    <h3>Modify</h3>
    <section>
        <form method="post" action="{{route('admin.menu.modify.prove', $menu[0]->id)}}">
            <input type="hidden" name="id" readonly value="{{$menu[0]->id}}">
            <input type="text" name="name" value="{{$menu[0]->name}}">
            <input type="text" name="url" value="{{$menu[0]->url}}">
            <label for="visible">Visible</label>
            <input type="checkbox" name="visible" id="visible" @if($menu[0]->visible === 1) checked @endif>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button class="submit">Save</button>
        </form>
    </section>
@endsection
