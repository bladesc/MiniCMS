@extends('administrator.index')

@section('content')
    <a class="new right" href="{{route('admin.template.add.item', 1)}}">Add logo <i class="far fa-plus-square"></i></a>
    <a class="new right" href="{{route('admin.template.add.item', 2)}}">Add header <i
            class="far fa-plus-square"></i></a>


    <div id="gallery">
        @foreach($templateImages as $templateImage)
            <div class="images">
               {{-- <p>{{$templateImage->item_type}}</p>--}}
                <img class="col-1 d-inline p-1 m-2 border" src="{{asset($templateImage->item_url)}}"
                     alt="{{$templateImage->item_name}}"/>
                <span>
                    {{$templateImage->item_name}}
                    <div class="form-container">
                    <form
                        action="{{route('admin.template.update.item', ['itemType' => $templateImage->item_type, 'itemId' => $templateImage->id])}}"
                        method="post">
                        <input type="hidden" required name="id" value="{{$templateImage->id}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <button class="other">Change</button>
                    </form>

                    <form
                        action="{{route('admin.template.delete.item',['itemType' => $templateImage->item_type, 'itemId' => $templateImage->id])}}"
                        method="post">
                        <input type="hidden" required name="id" value="{{$templateImage->id}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <button class="other">Delete</button>
                    </form>
                </div>
                </span>
            </div>
        @endforeach
        <div class="foot-box"></div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="foot-box"></div>
@endsection
