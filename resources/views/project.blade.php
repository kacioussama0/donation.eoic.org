@extends('layouts.header')

@section('title',$project->title)


@section('content')
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-body vstack gap-3">
                        <h3>{{$project->title}}</h3>
                        {!! $project->description !!}
                        <img src="{{asset('storage/' . $project->thumbnail)}}" alt="" class="img-fluid w-100 rounded-top-5">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>تم جمع</h6>
                                <span class="text-primary fw-bold">{{ $project->orders->where('status', 'paid')->sum('total_price') . '$'}}</span>
                            </div>
                            <div class="col-md-6">
                                <h6 >المبلغ المتبقي</h6>
                                <span class="text-primary fw-bold">{{$project->price - $project->orders->where('status', 'paid')->sum('total_price') . '$'}}</span>
                            </div>
                        </div>
                        <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{($project->orders->where('status', 'paid')->sum('total_price') * 100) / $project->price }}%">{{($project->orders->where('status', 'paid')->sum('total_price') * 100) / $project->price }}%</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="row g-5">
                    <div class="col-12 mb-5">
                        <div class="card shadow-sm border-0">
                            <div class="card-body vstack gap-3">
                                <h3>مبلغ التبرع</h3>
                                <form action="{{url('/checkout')}}" class="d-flex flex-column-reverse " method="POST">

                                    <div class="btn-group suggestions mt-3" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked value="1">
                                        <label class="btn btn-outline-primary" for="btnradio1">1$</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="2">
                                        <label class="btn btn-outline-primary" for="btnradio2">2$</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="10">
                                        <label class="btn btn-outline-primary" for="btnradio3">10$</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="20">
                                        <label class="btn btn-outline-primary" for="btnradio4">20$</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="50">
                                        <label class="btn btn-outline-primary" for="btnradio5">50$</label>



                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio6" autocomplete="off" value="100">
                                        <label class="btn btn-outline-primary" for="btnradio6">100$</label>

                                    </div>

                                    <div class="d-flex align-items-center ">
                                        <input type="number" name="price" min="0" class="form-control border-end-0 rounded-end-0"step="any" placeholder="مبلغ التبرع" required>

                                        @csrf
                                        <input type="hidden" name="project_id" value="{{$project->id}}" required>
                                        <input type="hidden" name="title" value="{{$project->title}}" required>
                                        <input type="hidden" name="description" value="{{$project->description}}">
                                        <input type="hidden" name="image" value="{{asset('storage/' . $project->thumbnail)}}">
                                        <button type="submit" class="btn btn-primary rounded-start-0">تبرع</button>
                                    </div>
                                </form>


                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body d-flex justify-content-center">
                                <i class="fa-duotone fa-eye fa-2x text-secondary me-3"></i>
                                <div class="d-flex align-items-center">
                                    <h3 class="text-primary fw-bold me-3">الزيارات</h3>
                                    <span> {{$project -> visitors }}  زيارة</span>
                                </div>
                            </div>
                        </div>



                            <div class="card shadow-sm border-0 mb-4">
                                <div class="card-body d-flex justify-content-center">
                                    <i class="fa-duotone fa-plane fa-2x text-secondary me-3"></i>
                                    <div class="d-flex align-items-center">
                                        <h3 class="text-primary fw-bold me-3">آخر عملية تبرع قبل</h3>
                                        <span>
                                            @if(count($project->orders))
                                                {{$project->orders->where('status','paid')->last()->created_at->diffForHumans()}}
                                            @else
                                                لايوجد متبرعين
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>

                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body d-flex justify-content-center">
                                <i class="fa-duotone fa-trademark fa-2x text-secondary me-3"></i>
                                <div class="d-flex align-items-center">
                                    <h3 class="text-primary fw-bold me-3">عدد عمليات التبرع</h3>
                                    <span>{{$project->orders->where('status','paid')->count()}}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>


    <script>

        $('.suggestions').on('click',function (event){
            if(event.target.value){
                $('input[name=price]').val(event.target.value)
            }
        })
    </script>

@endsection
