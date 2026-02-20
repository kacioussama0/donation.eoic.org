@extends('layouts.app')

@section('title','')


@section('content')



    <div class="container py-5">

        <div class="text-center mb-5">
            <h1 class="fw-bold display-5 mb-2">
                <img src="../imgs/single-pattern.svg" alt="">
                تصفّح الحملات
            </h1>
            <p class="text-muted mb-0">
                اختر الحملة التي ترغب بدعمها وساهم في صناعة الأثر
            </p>
        </div>



        @if(count($campaigns))

            {{--    Start Project  --}}

            <section class="campaigns">


                <div class="container">
                    <div class="row mt-5 g-5 projects">

                        @foreach($campaigns as $campaign)

                            <div
                                class="col-md-6 col-xl-4 {{$campaign->category->slug}} wow animate__animated animate__bounceIn project-item"
                                data-category=".{{$campaign->category->slug}}">

                                <div class="card p-2 border-0  h-100 rounded-5 shadow">


                                    <div class="card-body">

                                        <div class="position-relative">
                                            <img src="{{$campaign->thumbnail }}" alt=""
                                                 class="img-fluid object-fit-cover w-100 rounded-5" style="height: 200px; filter: blur({{$campaign->collected_amount >= $campaign->target_amount ? 2 : 0}}px)">


                                            @if($campaign->collected_amount >= $campaign->target_amount)

                                                <img src="imgs/complete-badge.svg" alt="" width="200" height="200" class="position-absolute start-50 top-50 translate-middle">

                                            @endif

                                            <span class="badge text-bg-warning position-absolute start-0 mt-2 mx-3 top-0">{{$campaign->category->title}}</span>

                                        </div>
                                        <h4 class="mt-4 clamp-text-2 fw-bold">{{$campaign->name}}</h4>


                                        <div class="progress rounded-0 mt-4" role="progressbar" style="height: 6px">

                                            <div class="progress-bar progress-bar-animated bg-primary rounded-pill"
                                                 style="width: {{ $campaign->progress_percentage }}%"></div>

                                        </div>

                                        <div class="mt-3 d-block fw-medium">تم جمع {{$campaign->collected_amount}}
                                            € — <span class="text-primary" >الهدف {{$campaign->target_amount}} €</span>
                                        </div>




                                        <a href="{{url('/campaigns/' . $campaign->slug)}}"
                                           class="btn btn-lg mt-3 px-5 rounded-pill btn-primary" >
                                            {{$campaign->collected_amount >= $campaign->target_amount ?  "الحملة مكتملة" : __('DONATE') }}
                                            <i class="fa-duotone {{$campaign->collected_amount >= $campaign->target_amount ?  "fa-check-circle" : "fa-arrow-up-left" }} ms-2"></i>
                                        </a>



                                    </div>


                                </div>


                            </div>

                        @endforeach

                    </div>
                </div>
            </section>

            {{--    End Project  --}}

        @endif

    </div>

@endsection
