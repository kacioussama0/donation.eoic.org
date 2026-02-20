@extends('layouts.app')

@section('title','نجاح')


@section('content')

    <div class="container py-4 py-md-5">

        <div class="card border-1 border-primary-subtle rounded-5 shadow-sm p-3 p-md-4 mx-auto thank-card">
            <div class="card-body vstack justify-content-center align-items-center gap-2 gap-md-3">

                <img src="{{ asset('imgs/thanks.png') }}" class="mb-2 img-fluid thank-img" alt="thank">

                <h1 class="text-center fw-bolder mb-2 mb-md-3 thank-title">
                    تقبل الله منك
                    <i class="fa-duotone fa-heart-circle text-danger"></i>
                </h1>

                <h2 class="text-primary d-flex align-items-center mb-1 mb-md-2 thank-subtitle text-center">
                    <i class="fa-duotone fa-badge-check me-2"></i>
                    تم استلام تبرعك بنجاح
                </h2>

                <span class="text-muted text-center">
                {{ $order->created_at->locale('ar')->translatedFormat('l, d F Y') }}
            </span>

                <img src="https://cdn.ehsan.sa/ehsan-ui/images/aya.svg"
                     class="img-fluid my-4 my-md-5 aya-img" alt="">

                <div class="table-responsive w-100">
                    <table class="table table-bordered table-sm align-middle mb-0">
                        <tbody>
                        <tr>
                            <th class="text-nowrap">رقم العملية</th>
                            <td class="text-secondary text-break">#{{ str_pad($order->id,5,"0",STR_PAD_LEFT) }}</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">الإسم الكامل</th>
                            <td class="text-break">{{ $order->donor_name }}</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">البريد الإلكتروني</th>
                            <td class="text-break">{{ $order->donor_email }}</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">تبرعك</th>
                            <td class="text-break">{{ number_format($order->amount, 2) }} &euro;</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">الحملة</th>
                            <td class="text-break">{{ $order->campaign->name }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-primary text-center mt-3 mt-md-4 w-100">
                    <h5 class="mb-0 fw-semibold">
                        تبرعك اليوم ليس مجرد مبلغ… بل أملٌ يصل إلى من يحتاجه.
                    </h5>
                </div>

                <div class="d-grid gap-2 w-100 mt-1">
                    <a href="#" class="btn btn-lg btn-outline-secondary rounded-pill">
                        مشاركة الحملة
                    </a>
                    <a href="{{ url('/') }}" class="btn btn-lg btn-primary rounded-pill">
                        الرجوع للتبرعات
                    </a>
                </div>

            </div>
        </div>

    </div>


@endsection
