@extends('layouts.app')

@section('title','عن الهيئة')


@section('content')

    <div class="about-header position-relative text-light">

        <div class="container d-flex align-items-center h-100">

            <div class="row">
                <div class="col-lg-6 col-12">

                    <div class=" vstack gap-3 text-lg-start text-center">
                        <h1>{{__('ABOUT_ORGANISATION')}}</h1>
                        <h3>{{__('NAME') . ' : ' .__('ORGANISATION_NAME')}}</h3>
                        <h5>{{__('SLOGAN') . ' : ' .__('ORGANISATION_SLOGAN')}}</h5>
                        <p>{{__('ORGANISATION_DESCRIPTION')}}</p>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <div class="goals py-5">


        <div class="container">

            <div class="row text-center g-5">


                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0  h-100">
                        <div class="card-body vstack gap-3 justify-content-center align-items-center">
                            <i class="fa-duotone fa-3x fa-eye text-primary"></i>
                            <h3>{{__('VISION')}}</h3>
                            <p>{{__('VISION_DESCRIPTION')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0  h-100">
                        <div class="card-body vstack gap-3 justify-content-center align-items-center">
                            <i class="fa-duotone fa-3x fa-bullseye-arrow text-primary"></i>
                            <h3>{{__('GOAL')}}</h3>
                            <p>{{__('GOAL_DESCRIPTION')}}</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0  h-100">
                        <div class="card-body vstack gap-3 justify-content-center align-items-center">
                            <i class="fa-duotone fa-3x fa-message text-primary"></i>
                            <h3>{{__('MESSAGE')}}</h3>
                            <p>{{__('MESSAGE_DESCRIPTION')}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <div class="goals py-5 bg-primary bg-opacity-25">
        <div class="container">
            <div class="row align-items-center g-4">

                <div class="col-12 col-lg-4 text-center text-lg-start">
                    <img src="{{ asset('imgs/ziyan.jpg') }}"
                         alt=""
                         class="rounded-5 img-fluid shadow-sm president-img">
                </div>

                <div class="col-12 col-lg-8 text-center text-lg-start">
                    <h3 class="fw-bold mb-2">{{ __('PRESIDENT') . ' ' . __('ORGANISATION_NAME') }}</h3>
                    <p class="mb-0 fs-5">{{ __('CHIKH') . ' : ' . __('ORGANISATION_PRESIDENT') }}</p>
                </div>

            </div>
        </div>
    </div>


@endsection
