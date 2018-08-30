@extends('administrator.index')

@section('content')
    <a class="new right" href="{{route('admin.template.add.logo')}}">Add logo <i class="far fa-plus-square"></i></a>
    <a class="new right" href="{{route('admin.template.add.header')}}">Add header <i class="far fa-plus-square"></i></a>

    <section>
        @foreach($templateImages as $templateImage)
            <div>
                <div class="img-container">
                    {{$templateImage->item_name}}
                    {{$templateImage->item_type}}
                    <img src="{{asset($templateImage->item_url)}}">
                </div>
                <div class="form-container">
                    <form action="{{route('admin.template.update.item' , $templateImage->id)}}" method="post">
                        <input type="hidden" required name="id" value="{{$templateImage->id}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="_method" value="put">
                        <button class="other">Change</button>
                    </form>

                    <form action="{{route('admin.template.delete.item', $templateImage->id)}}" method="post">
                        <input type="hidden" required name="id" value="{{$templateImage->id}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="_method" value="delete">
                        <button class="other">Delete</button>
                    </form>
                </div>
            </div>

        @endforeach
    </section>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="foot-box"></div>
@endsection
