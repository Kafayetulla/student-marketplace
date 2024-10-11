@extends('user.master')
@section('title', 'Shopping')
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> Shopping
            </div>
        </div>
    </div>
    @include('user.products')
@endsection
