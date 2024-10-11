<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CyberMart | @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('user/assets/imgs/theme/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/main.css')}}">
    @yield('customStyle')
    <link rel="stylesheet" href="{{asset('user/assets/css/custom.css')}}">
</head>

<body>
    @include('user.header')
    @include('user.mobile_header')
    <main class="main">
        @yield('content')
    </main>

    @include('user.footer')
    <!-- Vendor JS-->
    @include('user.includes.scripts')
    @yield('customScripts')
</body>
</html>
