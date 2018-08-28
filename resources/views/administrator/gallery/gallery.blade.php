@extends('administrator.index')

@section('content')
    <a class="new right" href="{{route('admin.gallery.add')}}">Add images<i class="far fa-plus-square"></i></a>
    <a class="new right"  href="{{route('admin.gallery.add.category')}}">Add category <i class="far fa-plus-square"></i></a>
    <section>
        <form method="get" action="{{route('admin.gallery')}}">


            <select name="sortByParameter">
                @foreach($parameters as $key => $value)
                    <option value="{{$key}}" {{$value[1]}}>{{$value[0]}}</option>
                @endforeach
            </select>


            <select name="sortByCategory">
                <option>All</option>
                @foreach($categories as $key )
                    <option value="{{$key['id']}}" {{$key['selected']}}>{{$key['name']}}</option>
                @endforeach
            </select>

            <button class="other">Sort <i class="fas fa-sort"></i></button>
        </form>
    </section>


    <div id="gallery">
        @foreach($images as $image)
            <div class="images">
                <img class="col-1 d-inline p-1 m-2 border" src="{{asset($image->url)}}" alt="{{$image->name}}"/>
                <span>{{$image->name}}</span>
            </div>
        @endforeach
        <div class="foot-box"></div>
    </div>

    <?php echo $images->links(); ?>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
@endsection
