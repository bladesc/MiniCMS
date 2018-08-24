@extends('administrator.index')

@section('content')
    <a href="{{route('admin.gallery.add')}}">Dodaj</a>

    <section>
        <form method="get" action="{{route('admin.gallery')}}">
            <select name="sortByParametr">
                <option value="nameAsc">Name ascending</option>
                <option value="nameDesc">Name descending</option>
                <option value="dateAsc">Date ascending</option>
                <option value="dateDesc">Date descending</option>
            </select>

            <select name="sortByCategory">
                <option value="nameAsc">Name ascending</option>
                <option value="nameDesc">Name descending</option>
                <option value="dateAsc">Date ascending</option>
                <option value="dateDesc">Date descending</option>
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
