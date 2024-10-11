@extends('user.dashboard-master')
@section('title', 'My Account | Address')
@section('dashboard.content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Address</h5>
        </div>
        <div class="card-body">
            <address>{{$user->address}}</address>
        </div>
    </div>
@endsection
