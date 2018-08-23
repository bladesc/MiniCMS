@extends('administrator.index')

@section('content')
    <form method="post" action="{{route('admin.cms.modify.prove', $cms[0]->id)}}">
        <input type="hidden" name="_put">
        <input type="hidden" name="id" readonly value="{{$cms[0]->id}}">
        <input type="text" name="name" value="{{$cms[0]->name}}">
        <input type="text" name="html" value="{{$cms[0]->html}}">
        <input type="checkbox" name="visible" @if($cms[0]->visible === 1) checked @endif>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <button>Zapisz</button>
    </form>
@endsection
