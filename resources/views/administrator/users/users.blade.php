@extends('administrator.index')

@section('content')
<table>
    <thead>
        <tr>
            <td></td>
        </tr>
    </thead>
    <tbody>

    <pre>
    </pre>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->nick}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<?php echo $users->links(); ?>
@endsection