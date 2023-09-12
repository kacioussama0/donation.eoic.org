@extends('layouts.header')

@section('title',$title)


@section('content')

    <div class="bg-header position-relative z-1 py-3 d-flex align-items-center text-center" style="background-image: url('{{asset('storage/' . $category->icon)}}')">
        <div class="container">
            <h1 class="fw-bold text-secondary mb-4 display-1">{{$title}}</h1>
        </div>
    </div>

    <img src="{{asset('imgs/ahseno-ayah.svg')}}" alt="ayat" class="img-fluid mx-auto d-block mt-5">

    <div class="container py-3">


        <div class="row my-5 g-5 projects">

            @foreach($projects as $project)

                <div class=" col-lg-6 col-xl-4 {{$project->category->slug()}} project-item" data-category="{{$project->category->slug()}}">
                    <div class="card border-0 shadow p-2 rounded-4">
                        <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">

                            <h5 class="text-truncate">{{$project->title()}}</h5>

                            <span>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#project-{{$project->id}}">
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
                                            <h3>{{__('SHARE_LINK_SOCIAL_MEDIA')}}</h3>
                                            <h5>{{__('SHARE_LINK')}}</h5>
                                            <div class="w-100 d-flex justify-content-between align-items-center">
                                                <input type="text" class="form-control me-3 " placeholder="{{__('SHARE_LINK')}}" readonly value="{{url('/projects/' . $project->id)}}">
                                                <button class="btn btn-primary d-block link">{{__('COPY')}}</button>
                                            </div>



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

                        <div class="card-body">

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

                            <div class="row mt-3">

                                <div class="col-4 vstack gap-1 align-items-center">
                                    <i class="fa-solid fa-plus fa-2x text-primary"></i>
                                    <h6 class="m-0">{{__('COLLECTED')}}</h6>
                                    <span class="text-primary fw-bold">{{ $project->orders->where('status', 'paid')->sum('total_price')}} &euro;</span>
                                </div>

                                <div class="col-4 vstack gap-1 align-items-center">
                                    <i class="fa-solid fa-percent fa-2x text-primary"></i>
                                    <h6 class="m-0">{{__('REMAINING')}}</h6>
                                    @if($project->status != 'completed')
                                        <span class="text-primary fw-bold">{{$project->price - $project->orders->where('status', 'paid')->sum('total_price')}} &euro;</span>
                                    @else
                                        <span class="text-primary fw-bold">0$</span>
                                    @endif
                                </div>

                                <div class="col-4 vstack gap-1 align-items-center">
                                    <i class="fa-solid fa-bullseye fa-2x text-primary"></i>
                                    <h6 class="m-0">{{__('GOAL')}}</h6>
                                    <span class="text-primary fw-bold">{{ $project -> price}} &euro;</span>
                                </div>



                                <div class="col-md-12 mt-3">
                                    @if($project->status == 'completed')


                                        <h3 class="text-center text-primary">
                                            <i class="fa-duotone fa-check-circle"></i>
                                            إكتمل المشروع</h3>
                                    @else




                                    <form action="{{url('/projects/' . $project->slug)}}" class="d-flex justify-content-between align-items-center" method="GET">

                                        <input type="number" name="amount" min="0" class="form-control border-end-0 rounded-end-0"step="any" placeholder="{{__('DONATE_AMOUNT')}}" required>

                                        <button type="submit" class="btn btn-primary rounded-start-0">{{__('DONATE')}}</button>
                                    </form>

                                    @endif
                                </div>



                            </div>
                        </div>

                        <div class="card-footer bg-transparent text-center">

                            <a href="{{url('/projects/' . $project->slug)}}">{{__('PROJECT_DETAILS')}}</a>
                        </div>

                    </div>
                </div>

            @endforeach

        </div>


    </div>

@endsection
