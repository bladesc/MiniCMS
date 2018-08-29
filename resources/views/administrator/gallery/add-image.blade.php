@extends('administrator.index')

@section('content')
    <h3>Add images</h3>
    <section>
        <form method="post" action="{{route('admin.gallery.add.prove')}}" enctype="multipart/form-data">

            <label for="sortByCategory">Category</label>
            <select name="sortByCategory" id="sortByCategory">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="PUT">
            <button name="save">Zapisz</button>
        </form>
    </section>
@endsection
