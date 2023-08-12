@extends('layouts.header')

@section('title','نجاح')


@section('content')


    <div class="container py-5 text-center vstack gap-4 justify-content-center align-items-center" style="height: 100vh">
        <i class="fa-duotone  fa-10x fa-circle-heart text-danger"></i>
        <h1 class="display-1 text-center text-primary fw-bold">شكرا جزيلا على تبرعكم</h1>
        <a href="{{url('/projects')}}" class="btn btn-lg btn-primary mx-auto">الرجوع للمشاريع</a>
    </div>

@endsection
