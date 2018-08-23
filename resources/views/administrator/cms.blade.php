@extends('administrator.index')

@section('content')
    <h3>Menu</h3>

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
        @foreach($menu as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->html}}</td>
                <td>{{$item->visible}}</td>
                <td>
                    <form method="POST" action="{{route('admin.cms.modify')}}">
                        <input type="hidden" readonly value="{{$item->id}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <button>modify</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{route('admin.cms.delete')}}">
                        <input type="hidden" readonly value="{{$item->id}}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <button>delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
