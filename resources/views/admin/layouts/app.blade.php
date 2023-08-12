<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <!-- Start Meta Tags -->
    <meta charset="UTF-8">
    <meta name="theme-color" content="#62259933">
    <link rel='icon' href='{{asset('assets/imgs/logo.svg')}}'>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- End Meta Tags -->

    <title>{{config('app.name')}} | @yield('title')</title>

    <!-- Start Links Tags  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('assets/css/admin.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.css')}}">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css"
    />
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

    <script>
        $(window).on('load',function(){

            $('.loader-container').fadeOut();
            $('body').removeClass('overflow-hidden');
        });
    </script>


    <!-- End Links Tags  -->

</head>
<body class="overflow-hidden">



<!-- Start Side Bar -->

<div id="app" >
    @include('admin.layouts.side')
</div>

<!-- End Side Bar -->


<!-- Start Content -->

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading  d-flex justify-content-between flex-column flex-md-row align-items-center">
        <h3 class="mb-5 mb-md-0"><i class="@yield('icon')"></i> @yield('title')</h3>


        <a href="{{url('/')}}" class="text-decoration-none"><i class="bi bi-arrow-return-right mx-2   align-middle"></i>{{__('forms.back-to-home')}}</a>
        <div class="d-flex d-block align-items-center">
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="link-primary btn"><i class="bi bi-box-arrow-in-left me-1 align-middle"></i>{{__('forms.log-out')}}</button>
            </form>
        </div>
    </div>





    @yield('content')

    <!-- End Content -->



@include('admin.layouts.footer')
