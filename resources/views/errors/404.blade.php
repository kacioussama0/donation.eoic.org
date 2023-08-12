@extends('layouts.header')

@section('title','لا يوجد')


@section('content')


    <div class="container py-5 text-center vstack gap-4 justify-content-center align-items-center" style="height: 100vh">
        <i class="fa-duotone  fa-10x fa-ban text-danger"></i>
        <h1 class="display-1 text-center text-primary fw-bold">عذرا الصفحة غير موجودة</h1>
        <h2 class="display-2 text-center text-danger fw-bold">404</h2>
        <a href="{{url('/')}}" class="btn btn-lg btn-primary mx-auto">الرجوع للرئيسية</a>
    </div>

@endsection
