@extends('layouts.header')

@section('title','الرئيسية')


@section('content')

    {{--    Start Landing Page  --}}

    <section class="landing-page vh-100 position-relative text-white flex-column  d-flex justify-content-center align-items-center">

          <div class="py-5 my-5">
                  <h1 class="mb-4 display-2 fw-bold text-center">منصة الهيئة الأوروبية للتبرعات</h1>
                  <p class="lh-lg text-center w-50 mx-auto">تعدّ منصة الهيئة الأوروبية للمراكز اللإسلامية الحل الأسهل والأمثل لإيصال المتبرع إلى المحتاج في شتى مناطق من خلال عملية تبرع آمنة وشفافة.</p>
                  <a href="{{url('/projects')}}" class="btn btn-lg btn-light d-block w-50 mx-auto">تصفح مشاريعنا</a>
          </div>

            <div class="statistics container  bg-white text-dark bg-primary text-center p-3  bg-opacity-75 justify-content-center rounded-5  w-100">

            <div class="row">
                <div class="col-md-4 vstack gap-2">
                    <span class="fs-3 text-primary fw-bold">{{$orders}}</span>
                    <h3>عدد العمليات التبرعية</h3>
                </div>

                <div class="col-md-4 vstack gap-2">
                    <span class="fs-3 text-primary fw-bold">{{$projects}}</span>
                    <h3>عدد المشاريع</h3>
                </div>

                <div class="col-md-4 vstack gap-2">
                    <span class="fs-3 text-primary fw-bold">{{$visitors}}</span>
                    <h3>عدد الزائرين</h3>
                </div>
            </div>


        </div>
        </div>
    </section>

    {{--    End Landing Page  --}}

@endsection
