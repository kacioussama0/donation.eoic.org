@extends('layouts.header')

@section('title',$title)


@section('content')

    <div class="bg-header position-relative z-1 py-3 d-flex align-items-center text-center">
        <div class="container">
            <h1 class="fw-bold text-secondary mb-4 display-1">{{$title}}</h1>
            <p>فرص تبرع متنوعة تصنع أثراً مستداماً وتحقق أثراً اجتماعياً واسعاً للحالات الأشد احتياجاً.</p>
        </div>
    </div>




    <div class="container py-4">

        <img src="{{asset('imgs/ahseno-ayah.svg')}}" alt="ayat" class="img-fluid mx-auto d-block my-5">


        <div class="categories my-4 mx-auto w-50">

                <div class="row gy-3 justify-content-center align-items-center">
                    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                        <input type="radio" class="btn-check" name="btnradio" id="category-all" autocomplete="off" checked data-filter="*">
                        <label class="btn btn-outline-primary w-100  rounded-pill" for="category-all" checked>
                            الكل
                        </label>
                    </div>

                    @foreach($categories as $category)

                        <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                            <input type="radio" class="btn-check" name="btnradio" id="category-{{$category->id}}" autocomplete="off"  data-filter=".{{$category->slug}}">
                            <label class="btn btn-outline-primary  w-100  rounded-pill" for="category-{{$category->id}}">
                                {{$category->title()}}
                            </label>
                        </div>
                    @endforeach

                </div>



            </div>


        <div class="row mt-5 g-3 projects">

            @foreach($projects as $project)

                <div class=" col-lg-6 col-xl-4 {{$project->category->slug}} project-item" data-category=".{{$project->category->slug}}">
                    <div class="card border-0 shadow p-2">
                        <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">

                            <h3>{{$project->title}}</h3>

                            <span>
                            <a href="" class="btn btn-outline-primary d-flex justify-content-center align-items-center p-2" data-bs-toggle="modal" data-bs-target="#project-{{$project->id}}">
                                <i class="fa-duotone fa-1x fa-share"></i>
                            </a>
                            </span>

                            <div class="modal fade" id="project-{{$project->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered  ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex flex-column justify-content-between align-items-center vstack gap-4">

                                            <i class="fa-duotone fa-chart-network fa-5x text-primary"></i>
                                            <h3>مشاركة عبر وسائل التواصل الاجتماعي</h3>
                                            <h5>رابط المشاركة</h5>
                                            <form action="" class="w-100 d-flex justify-content-between align-items-center">
                                                <input type="text" class="form-control me-3" placeholder="الرابط" readonly value="{{url('/projects/' . $project->id)}}">
                                                <button class="btn btn-primary d-block">نسخ </button>
                                            </form>

                                            <div class="social-media ">
                                                <a href="https://facebook.com" class="text-decoration-none">
                                                    <i class="fa-brands fa-facebook fa-2x me-3"></i>
                                                </a>

                                                <a href="https://x.com" class="text-decoration-none">
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

                        <div class="card-body">
                            <img src="{{asset('storage/' .$project->thumbnail )}}" alt="" class="img-fluid object-fit-cover rounded-top-5 w-100" style="height: 300px">
                            <div class="row mt-3">


                                <div class="col-12 col-sm-4 vstack gap-1 align-items-center">
                                    <i class="fa-solid fa-plus fa-2x text-primary"></i>
                                    <h6 class="m-0">المجمع</h6>
                                    <span class="text-primary fw-bold">{{ $project->orders->where('status', 'paid')->sum('total_price') . '$'}}</span>
                                </div>

                                <div class="col-12 col-sm-4 vstack gap-1 align-items-center">
                                    <i class="fa-solid fa-percent fa-2x text-primary"></i>
                                    <h6 class="m-0">المتبقي</h6>
                                    @if($project->status != 'completed')
                                        <span class="text-primary fw-bold">{{$project->price - $project->orders->where('status', 'paid')->sum('total_price') . '$'}}</span>
                                    @else
                                        <span class="text-primary fw-bold">0$</span>
                                    @endif
                                </div>

                                <div class="col-12 col-sm-4 vstack gap-1 align-items-center">
                                    <i class="fa-solid fa-bullseye fa-2x text-primary"></i>
                                    <h6 class="m-0">الهدف</h6>
                                    <span class="text-primary fw-bold">{{ $project -> price. '$'}}</span>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        @if($project->status != 'completed')
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{($project->orders->where('status', 'paid')->sum('total_price') * 100) / $project->price }}%">{{round($project->orders->where('status', 'paid')->sum('total_price') * 100/ $project->price ,2 )}}%</div>
                                        @else
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%">100%</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    @if($project->status == 'completed')


                                        <h3 class="text-center text-primary">
                                            <i class="fa-duotone fa-check-circle"></i>
                                            إكتمل المشروع</h3>


                                    @else




                                    <form action="{{url('/checkout')}}" class="d-flex justify-content-between align-items-center" method="POST">

                                        <input type="number" name="price" min="0" class="form-control border-end-0 rounded-end-0"step="any" placeholder="مبلغ التبرع" required>

                                        @csrf
                                        <input type="hidden" name="project_id" value="{{$project->id}}" required>
                                        <input type="hidden" name="title" value="{{$project->title}}" required>
                                        <input type="hidden" name="description" value="{{$project->description}}">
                                        <input type="hidden" name="image" value="{{asset('storage/' . $project->thumbnail)}}">
                                        <button type="submit" class="btn btn-primary rounded-start-0">تبرع</button>
                                    </form>

                                    @endif
                                </div>



                            </div>
                        </div>

                        <div class="card-footer bg-transparent text-center">

                            <a href="{{url('/projects/' . $project->slug)}}">تفاصيل المشروع</a>
                        </div>

                    </div>
                </div>

            @endforeach

        </div>


    </div>

        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

        <script>

            $(document).ready(function() {
                // init isotope

                let $listing = $('.projects').isotope({
                    itemSelector: '.project-item',
                    layoutMode: 'fitRows',
                    getSortData: {
                        name: '.item-name',
                        category: '[data-category]'
                    },
                    isOriginLeft: false
                });

                // bind filter button click
                $(".categories").on("click", "input", function() {
                    var filterValue = $(this).attr('data-filter');
                    $listing.isotope({ filter: filterValue });
                });


            });





        </script>

@endsection
