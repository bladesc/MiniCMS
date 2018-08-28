@extends('administrator.index')

@section('content')
    <table>
         @foreach($account as $account)
           <tr>
               <td>{{$account->email}}</td>
           </tr>
            <tr>
                <td>{{$account->name}}</td>
            </tr>


        @endforeach
    </table>
@endsection
