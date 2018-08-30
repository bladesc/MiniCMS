@extends('administrator.index')

@section('content')
    <h3>Delete Item</h3>
    <section>
        <p>Are you sure want to delete this item</p>
        <form method="post" action="{{route('admin.template.delete.item.prove' , ['itemType' => $itemType, 'itemId' => $itemId])}}">
            <input type="hidden" name="id" required value="{{$itemId}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button class="submit" name="delete">Delete</button>
        </form>
    </section>

@endsection
