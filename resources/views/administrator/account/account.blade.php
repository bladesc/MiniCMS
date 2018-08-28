@extends('administrator.index')

@section('content')
    <table>
         @foreach($account as $account)
            <tr><td><b>E-mail:</b></td><td>{{$account->email}}</td></tr>
            <tr><td><b>Nick:</b></td><td>{{$account->nick}}</td></tr>
            <tr><td><b>Name:</b></td><td>{{$account->name}}</td></tr>
            <tr><td><b>Address:</b></td><td>{{$account->address}}</td></tr>
            <tr><td><b>City:</b></td><td>{{$account->city}}</td></tr>
            <tr><td><b>Zip code:</b></td><td>{{$account->zip_code}}</td></tr>
            <tr><td><b>Number:</b></td><td>{{$account->number}}</td></tr>
            <tr><td><b>Avatar:</b></td><td>{{$account->avatar}}</td></tr>
            <tr><td><b>Created at:</b></td><td>{{$account->created_at}}</td></tr>
            <tr><td><b>Updated at:</b></td><td>{{$account->updated_at}}</td></tr>
        @endforeach
    </table>
@endsection
