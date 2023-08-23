@extends('layouts.header')

@section('title','نجاح')


@section('content')


    <div class="container py-5 text-center vstack gap-4 justify-content-center align-items-center" >
        <img src="{{asset('imgs/thanks.png')}}" alt="thank" class="img-fluid">
        <h1 class="display-4 text-center text-primary">شكرا جزيلا على تبرعكم</h1>
        <a href="{{url('/projects')}}" class="btn  btn-primary mx-auto">الرجوع للمشاريع</a>
    </div>

@endsection
