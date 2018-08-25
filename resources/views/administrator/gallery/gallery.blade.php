@extends('administrator.index')

@section('content')
    <a href="{{route('admin.gallery.add')}}">Dodaj zdjęcie</a>
    <a href="{{route('admin.gallery.add.category')}}">Dodaj kategorię</a>
    <section>
        <form method="get" action="{{route('admin.gallery')}}">
            <select name="sortByParameter">
                <option value="nameAsc" @if($_GET['sortByParameter'] === 'nameAsc') selected @endif>Name ascending</option>
                <option value="nameDesc" @if($_GET['sortByParameter'] === 'nameDesc') selected @endif>Name descending</option>
                <option value="dateAsc" @if($_GET['sortByParameter'] === 'dateAsc') selected @endif>Date ascending</option>
                <option value="dateDesc" @if($_GET['sortByParameter'] === 'dateDesc') selected @endif>Date descending</option>
            </select>

            <select name="sortByCategory">
                <option>All</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($_GET['sortByCategory'] == $category->id) selected @endif>{{$category->name}}</option>
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
