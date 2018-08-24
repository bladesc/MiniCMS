@extends('administrator.index')

@section('content')
    <form method="post" action="{{route('admin.gallery.add.prove')}}" enctype="multipart/form-data">
        <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <button name="zapisz">Zapisz</button>
    </form>
@endsection
