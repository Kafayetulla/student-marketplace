@extends('user.dashboard-master')
@section('title', 'My Account | Dashboard')
@section('dashboard.content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Hello {{$user->name}}! </h5>
        </div>
        <div class="card-body">
            <p>From your account dashboard. you can easily manage your profile, your products and your posts .</p>
        </div>
    </div>
@endsection
