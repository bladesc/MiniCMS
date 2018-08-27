@extends('administrator.index')

@section('content')
    <h3>Cms</h3>
    <a href="{{route('admin.cms.add')}}">Add</a>

    <section>
        <form method="get" action="{{route('admin.cms')}}">
            <select name="sortByParameter">
                <option value="nameAsc">Name ascending</option>
                <option value="nameDesc">Name descending</option>
                <option value="dateAsc">Date ascending</option>
                <option value="dateDesc">Date descending</option>
            </select>

            <button>Sortuj</button>
        </form>
    </section>

    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>html</th>
            <th>visible</th>
            <th>modify</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cms as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->html}}</td>
                <td>{{$item->visible}}</td>
                <td>
                    <form method="post" action="{{route('admin.cms.modify', $item->id)}}">
                        <input type="hidden" name="id" readonly value="{{$item->id}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <button>modify</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="{{route('admin.cms.delete', $item->id)}}">
                        <input type="hidden" name="id" readonly value="{{$item->id}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <button>delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <?php echo $cms->links(); ?>
@endsection
