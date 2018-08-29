@extends('administrator.index')
@section('head')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
@endsection

@section('content')
    <h3>Add</h3>
    <section>
        <form method="post" action="{{route('admin.cms.add.prove')}}">
            <input type="text" name="name" placeholder="name" required>
            <div class="editor">
                <textarea name="html" placeholder="html"></textarea>
            </div>
            <label for="visible">Visible</label>
            <input type="checkbox" name="visible" id="visible" checked>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button class="submit">Save</button>
        </form>
    </section>
@endsection
