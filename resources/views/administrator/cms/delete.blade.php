@extends('administrator.index')

@section('content')
    <h3>Delete</h3>
    <section>
        <p>Are you sure to delete this item?</p>
        <form method="post" action="{{route('admin.cms.delete.prove', $cms[0]->id)}}">
            <input type="hidden" name="_delete">
            <input type="hidden" name="id" readonly value="{{$cms[0]->id}}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button class="submit">Delete</button>
        </form>
        <a class="other" href="{{route('admin.cms')}}">Cancel</a>
    </section>
@endsection
