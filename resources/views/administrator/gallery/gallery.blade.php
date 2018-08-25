@extends('administrator.index')

@section('content')
    <a href="{{route('admin.gallery.add')}}">Dodaj zdjęcie</a>
    <a href="{{route('admin.gallery.add.category')}}">Dodaj kategorię</a>
    <section>
        <form method="get" action="{{route('admin.gallery')}}">


            <select name="sortByParameter">
                @foreach($parameters as $value => $name)
                    <option value="{{$value}}" {{$name[1]}}>{{$name[0]}}</option>
                @endforeach
            </select>


            <select name="sortByCategory">
                <option>All</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <button>Sortuj</button>
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
