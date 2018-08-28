@extends('administrator.index')

@section('content')
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nick</th>
            <th>E-mail</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>

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
