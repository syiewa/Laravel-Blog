@extends('layouts.users')

@section('content')
@if(count($users))
<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>Email</th>
    </tr>
    @if ($i= 1) @endif
    @foreach ($users as $user)
    <tr>
        <td>{{ $i }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
    </tr>
    @if ($i++) @endif
    @endforeach
</table>
@else 
No Data
@endif
@stop