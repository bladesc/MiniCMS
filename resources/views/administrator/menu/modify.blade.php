@extends('administrator.index')

@section('content')
    <form method="post" action="{{route('admin.menu.modify.prove', $menu[0]->id)}}">
        <input type="hidden" name="id" readonly value="{{$menu[0]->id}}">
        <input type="text" name="name" value="{{$menu[0]->name}}">
        <input type="text" name="url" value="{{$menu[0]->url}}">
        <input type="checkbox" name="visible" @if($menu[0]->visible === 1) checked @endif>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <button>Zapisz</button>
    </form>
@endsection
