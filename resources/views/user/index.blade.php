@extends('user.master')
@section('title', 'Home')
@section('content')
    @include('user.slider')
    @include('user.app_features')
    @include('user.products',['featured'=> 'Featured'])
{{--    @include('user.banner')--}}
@endsection
