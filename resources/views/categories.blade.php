@extends('layouts.app')

@section('title',__('CATEGORIES'))


@section('content')

    <div class="bg-primary bg-opacity-25 position-relative z-1 py-3 d-flex align-items-center text-center">
        <div class="container">
            <h1 class="fw-bold text-primary mb-4 display-1">{{__('CATEGORIES')}}</h1>
            <p>{{__('PROJECTS_HEADER_DESCRIPTION')}}</p>
        </div>

    </div>



    <div class="categories mb-5">
        <div class="container">

            <div class="row g-5 ">

                @foreach($categories as $category)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow border-0 rounded-5 category-overlay overflow-hidden"
                             style="background-image: url('{{$category->image_url}}');--category-color: {{$category->color_code}}">


                            <div class="card-body p-0" style="min-height: 250px">


                                <div
                                    class="infos position-absolute start-50 top-50 translate-middle z-3 w-100 text-center text-white vstack gap-3 align-items-center">
                                    <h4 class="fw-bold">{{$category->translations->where('locale','ar')[0]['name']}}</h4>
                                    <p>{{$category->translations->where('locale','ar')[0]['description']}}</p>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
