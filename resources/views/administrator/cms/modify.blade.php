@extends('administrator.index')

@section('content')
    <h3>Modify</h3>
    <section>
        <form method="post" action="{{route('admin.cms.modify.prove', $cms[0]->id)}}">
            <input type="hidden" name="id" readonly value="{{$cms[0]->id}}">
            <input type="text" name="name" value="{{$cms[0]->name}}">
            <input type="text" name="html" value="{{$cms[0]->html}}">
            <label for="visible">Visible</label>
            <input type="checkbox" name="visible" id="visible" @if($cms[0]->visible === 1) checked @endif>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button class="submit">Zapisz</button>
        </form>
    </section>
@endsection

