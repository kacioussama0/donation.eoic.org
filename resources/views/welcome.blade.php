@extends('layouts.header')
@section('title',__('HOME'))


@section('content')

    {{--    Start Hero Section  --}}


    <section class="hero-section">

        <div class="container  bg-primary bg-opacity-75 p-5 rounded-5  d-flex flex-column align-items-start justify-content-center text-light position-relative overflow-hidden">
            <p class="w-50 mb-4">منصة تبرعات رقمية موثوقة، معتمدة من الهيئة الأوروبية للمراكز الإسلامية، تُمكّنك من دعم المشاريع والحالات الإنسانية بكل أمان وشفافية، ليصل عطاؤك إلى مستحقيه.</p>
            <h1 class="display-3 fw-bolder mb-5">رحمة… عطاء يصل <br>ويصنع الفرق</h1>
                <button class="btn btn-outline-light px-4 btn-lg">تصفح حملاتنا</button>
            <img src="https://webheady.com/Charity-sympathy/images/slider/1.jpg" alt="bg" class="img-fluid object-fit-cover h-100 position-absolute start-0 top-0 z-n1">
        </div>

    </section>


    {{--    End Hero Section  --}}


{{--    <div class="container mt-5 text-center">--}}
{{--        <img src="https://ehsan.sa/assets/images/homepage/ahseno-ayah.svg" alt="ayat" class="img-fluid">--}}
{{--    </div>--}}



    {{--    Start Categories --}}

    <section class="categories my-5 pt-5">

        <div class="container">


            <h3 class="display-4 fw-bold">قطاعات التبرع</h3>



            <div class="row g-5 my-3">

                        @foreach($categories as $category)
                            <div class="col-md-6 col-lg-4">
                                <div class="card shadow border-0 rounded-5 category-overlay overflow-hidden" style="background-image: url('{{$category->image_url}}');--category-color: {{$category->color_code}}">


                                    <div class="card-body p-0" style="min-height: 250px">


                                        <div class="infos position-absolute start-50 top-50 translate-middle z-3 w-100 text-center text-white vstack gap-3 align-items-center">
                                            <h4 class="fw-bold">{{$category->translations->where('locale','ar')[0]['name']}}</h4>
                                            <p>{{$category->translations->where('locale','ar')[0]['description']}}</p>
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

    <section class="donate py-5 my-5">

        <div class="container">

            <h3 class="text-center special-heading">{{__('HOW_TO_DONATE')}}</h3>


            <div class="row text-center g-5  my-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow p-4 border-0  h-100">
                        <div class="card-body vstack gap-3 justify-content-center align-items-center">
                            <i class="fa-duotone fa-3x fa-project-diagram text-primary"></i>
                            <h3>{{__('PROJECT')}}</h3>
                            <p class="text-muted">
                                {{__('PROJECT_DESCRIPTION')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow p-4 border-0  h-100">
                        <div class="card-body vstack gap-3 justify-content-center align-items-center">
                            <i class="fa-duotone fa-3x fa-money-bill text-primary"></i>
                            <h3>{{__('MONEY')}}</h3>
                            <p class="text-muted">
                                {{__('MONEY_DESCRIPTION')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow p-4 border-0  h-100">
                        <div class="card-body vstack gap-3 justify-content-center align-items-center">
                            <i class="fa-brands fa-3x fa-cc-visa text-primary"></i>
                            <h3>{{__('PAYMENT_METHODS')}}</h3>
                            <p class="text-muted">
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
                    <span class="fs-3 fw-bold">{{$orders}}</span>
                    <h3>{{__('OPERATION_NUMBERS')}}</h3>
                </div>

                <div class="col-md-4 vstack gap-2 align-items-center">
                    <i class="fa-duotone fa-project-diagram  fa-3x"></i>
                    <span class="fs-3 fw-bold">{{count($projects)}}</span>
                    <h3>{{__('PROJECT_NUMBERS')}}</h3>
                </div>

                <div class="col-md-4 vstack gap-2 align-items-center">
                    <i class="fa-duotone fa-eye  fa-3x"></i>
                    <span class="fs-3 fw-bold">{{$visitors}}</span>
                    <h3>{{__('VISITOR_NUMBERS')}}</h3>
                </div>

            </div>

        </div>


    </div>

@if(count($projects))

    {{--    Start Project  --}}

    <section class="projects my-5 py-5">

        <h3 class="text-center special-heading">{{__('LATEST_PROJECTS')}}</h3>

        <div class="container">
            <div class="row mt-5 g-5 projects">

                @foreach($projects as $project)

                    <div class="col-md-6 col-xl-4 {{$project->category->slug}} wow animate__animated animate__bounceIn project-item" data-category=".{{$project->category->slug}}" >

                        <div class="card p-2 border-0 shadow-sm h-100 rounded-4">


                            <div class="card-body">

                                    <img src="{{$project->thumbnail }}" alt="" class="img-fluid object-fit-cover rounded-5" style="height: 200px">

                                    <h4 class="mt-4 clamp-text-2 fw-bold">{{$project->title}}</h4>

                                    <div class="progress rounded-0 mt-4" role="progressbar" style="height: 6px" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        @if($project->status != 'completed')
                                            <div class="progress-bar progress-bar-animated rounded-pill"  style="width: {{($project->orders->where('status', 'paid')->sum('total_price') * 100) / $project->price }}%"></div>
                                        @else
                                            <div class="progress-bar progress-bar-animated rounded-pill"  style="width: 100%;background-color: {{$project->category->color_code}}"></div>
                                        @endif
                                    </div>

                                    <div class="mt-3 d-block fw-medium">تم جمع {{$project->orders->sum('total_price')}} € — <span style="color: {{$project->category->color_code}}">الهدف {{$project->price}} €</span></div>

                                    <a href="{{url('/projects/' . $project->slug())}}" class="btn btn-lg mt-3 px-5 rounded-pill text-light" style="background-color: {{$project->category->color_code}}">
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
@endsection
