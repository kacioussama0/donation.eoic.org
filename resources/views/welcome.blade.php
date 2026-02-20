@extends('layouts.app')
@section('title',__('HOME'))


@section('content')

    {{--    Start Hero Section  --}}


    <section class="hero-section py-4 py-md-5">
        <div class="container">
            <div
                class="bg-primary bg-opacity-75 text-light position-relative overflow-hidden rounded-5
                   p-4 p-md-5 d-flex flex-column align-items-start justify-content-center
                   hero-min-h">

                <p class="mb-4 col-12 col-md-7 col-lg-6">
                    منصة تبرعات رقمية موثوقة، معتمدة من الهيئة الأوروبية للمراكز الإسلامية، تُمكّنك من دعم
                    المشاريع والحالات الإنسانية بكل أمان وشفافية، ليصل عطاؤك إلى مستحقيه.
                </p>

                <h1 class="fw-bolder mb-4 mb-md-5 hero-title">
                    رحمة… عطاء يصل <br class="d-none d-md-block"> ويصنع الفرق
                </h1>

                <a class="btn btn-outline-light px-4 btn-lg" href="{{url('/campaigns')}}">
                    تصفح حملاتنا
                </a>

                <img src="https://webheady.com/Charity-sympathy/images/slider/1.jpg" alt="bg"
                     class="img-fluid object-fit-cover position-absolute start-0 top-0 w-100 h-100 z-n1">
            </div>
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
                <div class="row mt-5 gy-3 g-lg-5 projects">

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






    {{--    Start Categories --}}

    <section class="categories position-relative mt-5 py-5 ">

        <div class="container">


            <h3 class="display-4 fw-bold text-center ">
                <img src="../imgs/single-pattern.svg" alt="">
                قطاعات التبرع
            </h3>


            <div class="row  gy-3  g-lg-5 mt-3">

                @foreach($categories as $category)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow border-0 rounded-5 category-overlay overflow-hidden"
                             style="background-image: url('{{$category->image_url}}');--category-color: {{$category->color_code}}">


                            <div class="card-body" style="min-height: 250px">

                                <div
                                    class="infos p-4 position-absolute start-50 top-50 translate-middle z-3 w-100 text-center text-white vstack gap-3 align-items-center">
                                    <h4 class="fw-bold">{{$category->title}}</h4>
                                    <p>{{$category->description}}</p>
                                    <a href="#" class="stretched-link"></a>
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
                <div class="col-md-4 vstack  align-items-center">
                    <i class="fa-duotone fa-coins mb-3  fa-3x"></i>
                    <span class="fs-3 fw-bold"> {{$donationsCount + 3000}} +</span>
                    <h3 class="my-0">{{__('OPERATION_NUMBERS')}}</h3>
                </div>

                <div class="col-md-4 vstack align-items-center">
                    <i class="fa-duotone fa-praying-hands  mb-3  fa-3x"></i>
                    <span class="fs-3 fw-bold">{{$campaignsCount + 25}} +</span>
                    <h3 class="my-0">عدد الحملات</h3>
                </div>

                <div class="col-md-4 vstack  align-items-center">
                    <i class="fa-duotone fa-users mb-3  fa-3x"></i>
                    <span class="fs-3 fw-bold">+ {{$visitorsCount + 11022}}</span>
                    <h3 class="my-0">{{__('VISITOR_NUMBERS')}}</h3>
                </div>

            </div>

        </div>


    </div>



    <section class="py-5 bg-light">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">الأسئلة الشائعة</h2>
                <p class="text-muted">إجابات لأكثر الأسئلة شيوعًا حول منصة رحمة والتبرعات</p>
            </div>

            <div class="accordion accordion-flush" id="rahmaFaq">

                <div class="accordion-item rounded-4 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq5">
                                ما هي منصة رحمة
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse"
                         data-bs-parent="#rahmaFaq">
                        <div class="accordion-body text-muted">
                            منصة تبرعات رقمية موثوقة، معتمدة من الهيئة الأوروبية للمراكز الإسلامية. تُمكّنك من دعم المشاريع والحالات الإنسانية بكل أمان وشفافية، ليصل عطاؤك إلى مستحقيه.
                        </div>
                    </div>
                </div>


                <!-- Q1 -->
                <div class="accordion-item rounded-4 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq1">
                            هل التبرعات عبر منصة رحمة آمنة؟
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse"
                         data-bs-parent="#rahmaFaq">
                        <div class="accordion-body text-muted">
                            نعم، جميع التبرعات تتم عبر بوابات دفع آمنة ومعتمدة،
                            ويتم تشفير البيانات لحماية معلومات المتبرعين.
                        </div>
                    </div>
                </div>

                <!-- Q2 -->
                <div class="accordion-item rounded-4 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq2">
                            كيف يتم اختيار الحملات المعروضة؟
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse"
                         data-bs-parent="#rahmaFaq">
                        <div class="accordion-body text-muted">
                            تخضع جميع الحملات لمراجعة دقيقة لضمان الشفافية والمصداقية
                            قبل نشرها على المنصة.
                        </div>
                    </div>
                </div>

                <!-- Q3 -->
                <div class="accordion-item rounded-4 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq3">
                            هل يمكنني التبرع بشكل متكرر شهريًا؟
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse"
                         data-bs-parent="#rahmaFaq">
                        <div class="accordion-body text-muted">
                            نعم، يمكنك اختيار التبرع الشهري لدعم الحملات بشكل مستمر.
                        </div>
                    </div>
                </div>

                <!-- Q4 -->
                <div class="accordion-item rounded-4 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq4">
                            كيف أعرف أن تبرعي وصل إلى مستحقيه؟
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse"
                         data-bs-parent="#rahmaFaq">
                        <div class="accordion-body text-muted">
                            نقوم بنشر تقارير دورية عن أثر الحملات وإجمالي المبالغ
                            المصروفة لضمان الشفافية الكاملة.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
