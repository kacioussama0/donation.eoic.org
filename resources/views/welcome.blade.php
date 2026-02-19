@extends('layouts.app')
@section('title',__('HOME'))


@section('content')

    {{--    Start Hero Section  --}}


    <section class="hero-section">

        <div
            class="container  bg-primary bg-opacity-75 p-5 rounded-5  d-flex flex-column align-items-start justify-content-center text-light position-relative overflow-hidden">
            <p class="w-50 mb-4">منصة تبرعات رقمية موثوقة، معتمدة من الهيئة الأوروبية للمراكز الإسلامية، تُمكّنك من دعم
                المشاريع والحالات الإنسانية بكل أمان وشفافية، ليصل عطاؤك إلى مستحقيه.</p>
            <h1 class="display-3 fw-bolder mb-5">رحمة… عطاء يصل <br>ويصنع الفرق</h1>
            <button class="btn btn-outline-light px-4 btn-lg">تصفح حملاتنا</button>
            <img src="https://webheady.com/Charity-sympathy/images/slider/1.jpg" alt="bg"
                 class="img-fluid object-fit-cover h-100 position-absolute start-0 top-0 z-n1">
        </div>

    </section>


    {{--    End Hero Section  --}}


        <div class="container my-5 text-center">
            <img src="https://ehsan.sa/assets/images/homepage/ahseno-ayah.svg" alt="ayat" class="img-fluid">
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

                                    <img src="{{$campaign->thumbnail }}" alt=""
                                         class="img-fluid object-fit-cover w-100 rounded-5" style="height: 200px;">

                                    <h4 class="mt-4 clamp-text-2 fw-bold">{{$campaign->name}}</h4>


                                    <div class="progress rounded-0 mt-4" role="progressbar" style="height: 6px">

                                            <div class="progress-bar progress-bar-animated bg-primary rounded-pill"
                                                 style="width: {{ $campaign->progress_percentage }}%"></div>

                                    </div>

                                    <div class="mt-3 d-block fw-medium">تم جمع {{$campaign->collected_amount}}
                                        € — <span class="text-primary" >الهدف {{$campaign->target_amount}} €</span>
                                    </div>

                                    <a href="{{url('/campaigns/' . $campaign->slug)}}"
                                       class="btn btn-lg mt-3 px-5 rounded-pill btn-primary">
                                        {{__('DONATE')}}
                                        <i class="fa-duotone fa-arrow-up-left ms-2"></i>
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






    {{--    Start Categories --}}

    <section class="categories position-relative mt-5 py-5 ">

        <div class="container">


            <h3 class="display-4 fw-bold text-center ">
                <img src="../imgs/single-pattern.svg" alt="">
                قطاعات التبرع
            </h3>


            <div class="row g-5 mt-3">

                @foreach($categories as $category)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow border-0 rounded-5 category-overlay overflow-hidden"
                             style="background-image: url('{{$category->image_url}}');--category-color: {{$category->color_code}}">


                            <div class="card-body" style="min-height: 250px">

                                <div
                                    class="infos p-4 position-absolute start-50 top-50 translate-middle z-3 w-100 text-center text-white vstack gap-3 align-items-center">
                                    <h4 class="fw-bold">{{$category->title}}</h4>
                                    <p>{{$category->description}}</p>
                                    <a href="{{url($category->slug)}}" class="stretched-link"></a>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>


    </section>


    {{--    End Categories--}}



    {{--    Start How To Donate  --}}

    <section class="donate py-5 mb-5 bg-primary border-top border-opacity-10 bg-opacity-10">

        <div class="container">

            <h3 class="display-4 fw-bold text-center ">
                <img src="../imgs/single-pattern.svg" alt="">
                {{__('HOW_TO_DONATE')}}
            </h3>

            <div class="row text-center g-5 my-4">

                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card rounded-5 shadow-sm p-4 border-0 h-100">
                        <div class="card-body vstack gap-4 justify-content-center align-items-center">

                            <div class="feature-icon bg-primary bg-opacity-10 text-primary">
                                <i class="fa-duotone fa-rocket"></i>
                            </div>

                            <h4 class="fw-bold">{{__('PROJECT')}}</h4>

                            <p class="text-muted mb-0">
                                {{__('PROJECT_DESCRIPTION')}}
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card shadow-sm rounded-5 p-4 border-0 h-100">
                        <div class="card-body vstack gap-4 justify-content-center align-items-center">

                            <div class="feature-icon bg-success bg-opacity-10 text-success">
                                <i class="fa-duotone fa-money-bill"></i>
                            </div>

                            <h4 class="fw-bold">{{__('MONEY')}}</h4>

                            <p class="text-muted mb-0">
                                {{__('MONEY_DESCRIPTION')}}
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card feature-card shadow-sm p-4 rounded-5 border-0 h-100">
                        <div class="card-body vstack gap-4 justify-content-center align-items-center">

                            <div class="feature-icon bg-warning bg-opacity-10 text-warning">
                                <i class="fa-brands fa-cc-visa"></i>
                            </div>

                            <h4 class="fw-bold">{{__('PAYMENT_METHODS')}}</h4>

                            <p class="text-muted mb-0">
                                {{__('PAYMENT_METHODS_DESCRIPTION')}}
                            </p>

                        </div>
                    </div>
                </div>

            </div>


        </div>

    </section>


    {{--    End How To Donate  --}}



    <div class="statistics position-relative z-2 py-5 my-5  text-white bg-primary text-center   justify-content-center">

        <div class="container py-5">

            <div class="row gy-5 gy-md-0">
                <div class="col-md-4 vstack gap-2  align-items-center">
                    <i class="fa-duotone fa-donate  fa-3x"></i>
                    <span class="fs-3 fw-bold">0</span>
                    <h3>{{__('OPERATION_NUMBERS')}}</h3>
                </div>

                <div class="col-md-4 vstack gap-2 align-items-center">
                    <i class="fa-duotone fa-project-diagram  fa-3x"></i>
                    <span class="fs-3 fw-bold">0</span>
                    <h3>{{__('PROJECT_NUMBERS')}}</h3>
                </div>

                <div class="col-md-4 vstack gap-2 align-items-center">
                    <i class="fa-duotone fa-eye  fa-3x"></i>
                    <span class="fs-3 fw-bold">0</span>
                    <h3>{{__('VISITOR_NUMBERS')}}</h3>
                </div>

            </div>

        </div>


    </div>

@endsection
