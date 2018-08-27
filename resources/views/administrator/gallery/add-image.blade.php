@extends('administrator.index')

@section('content')

    <section>
        <form method="post" action="{{route('admin.gallery.add.prove')}}" enctype="multipart/form-data">

            <select name="sortByCategory">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="PUT">
            <button name="zapisz">Zapisz</button>
        </form>
    </section>
@endsection
