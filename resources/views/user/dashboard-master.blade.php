@extends('user.master')
@section('content')
    @include('sweetalert::alert');
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{url('/home')}}" rel="nofollow">Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>
    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="dashboard-menu">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{Route::is('user.dashboard') ? 'active': ''}}" href="{{route('user.dashboard')}}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{Route::is('user.products.*') ? 'active': ''}}" href="{{route('user.products.index')}}"><i class="fi-rs-laptop mr-10"></i>Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{Route::is('user.to-lets.*') ? 'active': ''}}" href="{{route('user.to-lets.index')}}"><i class="fi-rs-home mr-10"></i>To-Lets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{Route::is('user.address') ? 'active': ''}}" href="{{route('user.address')}}"><i class="fi-rs-marker mr-10"></i>My Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{Route::is('user.details') ? 'active': ''}}" href="{{route('user.details')}}"><i class="fi-rs-user mr-10"></i>Account details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('user.logout')}}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="dashboard-content">
                        @if ($errors->any())
                            <div class="text-warning">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @yield('dashboard.content')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
