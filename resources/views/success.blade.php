@extends('layouts.app')

@section('title','نجاح')


@section('content')

    <div class="container py-5">


        <div class="card border-1 border-primary-subtle rounded-5 shadow-sm  p-4 mx-auto" style="width: fit-content">
            <div class="card-body vstack justify-content-center align-items-center">
                <img src="{{asset('imgs/thanks.png')}}" class="mb-3" alt="thank" width="250px">
                <h1 class="text-center fw-bolder mb-3">
                    تقبل الله منك
                    <i class="fa-duotone fa-heart-circle text-danger"></i>
                </h1>

                <h2 class=" text-primary d-flex align-items-center mb-2">
                    <i class="fa-duotone fa-badge-check me-2"></i>
                    تم استلام تبرعك بنجاح
                </h2>

                <span class="text-muted">{{ $order->created_at->locale('ar')->translatedFormat('l, d F Y') }}</span>

                <div class="table-responsive w-100 mt-5">
                    <table class="table table-bordered">

                        <tr>
                            <th>رقم العملية</th>
                            <td class="text-secondary">#{{str_pad($order->id,5,"0",STR_PAD_LEFT)}}</td>
                        </tr>

                        <tr>
                            <th>الإسم الكامل</th>
                            <td>{{$order->donor_name}}</td>
                        </tr>


                        <tr>
                            <th>البريد الإلكتروني</th>
                            <td>{{$order->donor_email}}</td>
                        </tr>

                        <tr>
                            <th>تبرعك</th>
                            <td>{{number_format($order->amount, 2)}} &euro;</td>
                        </tr>

                        <tr>
                            <th>الحملة</th>
                            <td>{{$order->campaign->name}}</td>
                        </tr>
                    </table>
                </div>

                <div class="alert alert-primary text-center mb-4">
                    <h3 class="mb-0">تبرعك اليوم ليس مجرد مبلغ… بل أملٌ يصل إلى من يحتاجه.</h3>
                </div>

                <a href="#" class="btn btn-lg btn-outline-secondary rounded-pill mb-2 w-50">مشاركة الحملة</a>
                <a href="{{url('/')}}" class="btn btn-lg btn-primary rounded-pill w-50">الرجوع للتبرعات</a>

            </div>
        </div>

    </div>

@endsection
