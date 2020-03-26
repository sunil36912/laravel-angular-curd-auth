@extends('layouts.app')
@section('users')
@auth
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <h3 class="text-danger text-center">All Users</h3>
    <ul>
        @foreach ($users as $user)
        <li>
            <a href="{{route('chat.recipt',$user['id'])}}"> {{$user['name']}}</a>
        </li>
        @endforeach>

    </ul>
</div>

<div id="main">
    <button class="openbtn btn-small" onclick="openNav()">&#9776;</button>
</div>
@endauth
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <notification-component></notification-component>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection