@extends('administrator.index')

@section('content')
    <form method="post" action="{{route('admin.cms.delete.prove', $cms[0]->id)}}">
        <input type="hidden" name="_delete">
        <input type="hidden" name="id" readonly value="{{$cms[0]->id}}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <button>Zapisz</button>
    </form>
    <a href="{{route('admin.cms')}}">Anuluj</a>
@endsection
