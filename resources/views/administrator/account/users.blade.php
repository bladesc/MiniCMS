@extends('administrator.index')

@section('content')
<table>
    <thead>
        <tr>
            <td></td>
        </tr>
    </thead>
    <tbody>

    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
