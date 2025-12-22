@extends('layouts.header')
@section('title',__('HOME'))


@section('content')

    {{--    Start Hero Section  --}}


    <section class="hero-section">

        <div class="container d-flex flex-column align-items-start justify-content-center text-light">

                <h1 class="display-3 fw-bolder">رحمة… عطاء يصل ويصنع الفرق</h1>
                <p class="w-50">منصة تبرعات رقمية موثوقة، معتمدة من الهيئة الأوروبية للمراكز الإسلامية، تُمكّنك من دعم المشاريع والحالات الإنسانية بكل أمان وشفافية، ليصل عطاؤك إلى مستحقيه.</p>
                <button class="btn btn-success btn-lg">تبرع الآن</button>

        </div>

    </section>


    {{--    End Hero Section  --}}


    <div class="container mt-5 text-center">
        <img src="https://ehsan.sa/assets/images/homepage/ahseno-ayah.svg" alt="ayat" class="img-fluid">
    </div>

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

                    <div class="col-md-6 col-xl-4 {{$project->category->slug()}} wow animate__animated animate__bounceIn project-item" data-category=".{{$project->category->slug()}}">

                        <div class="card border-0 shadow h-100 rounded-4">
                            <div class="card-header p-4 bg-transparent border-0 d-flex justify-content-between align-items-center">

                                <h5 class="text-truncate mb-0">{{$project->title()}}</h5>

                                <a href="#" data-bs-toggle="modal" data-bs-target="#project-{{$project->id}}" class="ms-3">
                                    <i class="fa-duotone fa-1x fa-share"></i>
                                </a>

                            </div>

                            <div class="card-body">
                                <div class="position-relative">
                                    <span class="  text-center  py-2 px-4  fw-bold  mb-2 text-bg-secondary d-block position-absolute  start-50  translate-middle-x rounded-bottom-5 ">
                                        <img src="{{asset('storage/' . $project->category->icon)}}" alt="" class="img-fluid" style="width: 30px">
                                        <h6>{{$project->category->title()}}</h6>
                                    </span>


                                    <div class="position-relative">
                                        <img src="{{asset('storage/' .$project->thumbnail )}}" alt="" class="img-fluid object-fit-cover rounded-top-5 w-100" style="height: 200px">

                                        <div class="progress rounded-0" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                            @if($project->status != 'completed')
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{($project->orders->where('status', 'paid')->sum('total_price') * 100) / $project->price }}%">{{round($project->orders->where('status', 'paid')->sum('total_price') * 100/ $project->price ,3 )}}%</div>
                                            @else
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%">100%</div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-3">

                                    <div class="col-6 col-md-4 vstack gap-1 align-items-center">
                                        <i class="fa-solid fa-plus fa-2x text-primary"></i>
                                        <h6 class="m-0">{{__('COLLECTED')}}</h6>
                                        <span class="text-primary fw-bold">{{ $project->orders->where('status', 'paid')->sum('total_price')}} &euro;</span>
                                    </div>

                                    <div class="col-6 col-md-4 vstack gap-1 align-items-center">
                                        <i class="fa-solid fa-percent fa-2x text-primary"></i>
                                        <h6 class="m-0">{{__('REMAINING')}}</h6>
                                        @if($project->status != 'completed')
                                            <span class="text-primary fw-bold">{{$project->price - $project->orders->where('status', 'paid')->sum('total_price')}} &euro;</span>
                                        @else
                                            <span class="text-primary fw-bold">0&euro;</span>
                                        @endif
                                    </div>

                                    <div class="col-6 col-md-4 vstack gap-1 align-items-center">
                                        <i class="fa-solid fa-bullseye fa-2x text-primary"></i>
                                        <h6 class="m-0">{{__('GOAL')}}</h6>
                                        <span class="text-primary fw-bold">{{ $project -> price}} &euro;</span>
                                    </div>



                                    <div class="col-md-12 mt-3">
                                        @if($project->status == 'completed')
                                            <h3 class="text-center text-primary">
                                                <i class="fa-duotone fa-check-circle"></i>
                                                {{__('PROJECT_COMPLETED')}}
                                            </h3>
                                        @else

                                            <form action="{{url('/projects/' . $project->slug)}}" class="d-flex justify-content-between align-items-center" method="GET">

                                                <input type="number" name="amount" min="0" class="form-control border-end-0 rounded-end-0"step="any" placeholder="{{__('DONATE_AMOUNT')}}" required>

                                                <button type="submit" class="btn btn-primary rounded-start-0">{{__('DONATE')}}</button>

                                            </form>

                                        @endif

                                    </div>

                                </div>
                            </div>

                            <div class="card-footer bg-primary py-3 text-center border-0">
                                <a href="{{url('/projects/' . $project->slug())}}" class="w-100 h-100  d-block text-decoration-none text-light">{{__('PROJECT_DETAILS')}}</a>
                            </div>

                        </div>

                        <div class="modal fade" id="project-{{$project->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered  ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex flex-column justify-content-between align-items-center vstack gap-4">

                                        <i class="fa-duotone fa-chart-network fa-5x text-primary"></i>
                                        <h3>{{__('SHARE_LINK_SOCIAL_MEDIA')}}</h3>
                                        <h5>{{__('SHARE_LINK')}}</h5>
                                        <form action="" class="w-100 d-flex justify-content-between align-items-center">
                                            <input type="text" class="form-control me-3" placeholder="{{__('SHARE')}}" readonly value="{{url('/projects/' . $project->id)}}">
                                            <button class="btn btn-primary d-block">{{__('COPY')}} </button>
                                        </form>

                                        <div class="social-media ">
                                            <a href="https://www.facebook.com/sharer.php?u={{url('/projects/' . $project->id)}}" class="text-decoration-none">
                                                <i class="fa-brands fa-facebook fa-2x me-3"></i>
                                            </a>

                                            <a href="https://twitter.com/intent/tweet?text={{$project->title()}}&url={{url('/projects/' . $project->id)}}" class="text-decoration-none">
                                                <i class="fa-brands fa-twitter fa-2x me-3"></i>
                                            </a>

                                            <a href="https://facebook.com" class="text-decoration-none">
                                                <i class="fa-brands fa-whatsapp fa-2x me-3"></i>
                                            </a>
                                        </div>

                                    </div>

                                </div>
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
