@extends('layouts.header')

@section('title',$project->title)


@section('meta')

    <meta property="og:title" content="{{$project->title}}"/>
    <meta property="og:image" content="{{asset('storage/' . $project->thumbnail)}}"/>
    <meta property="og:site_name" content="{{__('APP_NAME')}}"/>
    <meta property="og:description" content="{{$project->description}}"/>
    <meta name="twitter:title" content="{{$project->title}}">
    <meta name="twitter:description" content="{{__('APP_NAME')}}">
    <meta name="twitter:image" content="{{asset('storage/' . $project->thumbnail)}}">
    <meta name="twitter:card" content="summary_large_image">

@endsection


@section('content')
    <div class="container py-5 my-5">
        <div class="row g-5">
            <div class="col-md-6">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body vstack gap-3">
                        <h3>{{$project->title()}}</h3>
                        {!! $project->description() !!}
                        <img src="{{asset('storage/' . $project->thumbnail)}}" alt="" class="img-fluid w-100 rounded-top-5">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>تم جمع</h6>
                                <span class="text-primary fw-bold">{{ $project->orders->where('status', 'paid')->sum('total_price')}} &euro;</span>
                            </div>
                            <div class="col-md-6">
                                <h6 >المبلغ المتبقي</h6>
                                <span class="text-primary fw-bold">{{$project->price - $project->orders->where('status', 'paid')->sum('total_price') < 0 ? 0 : $project->price - $project->orders->where('status', 'paid')->sum('total_price')}} &euro;</span>
                            </div>
                        </div>
                        <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{($project->orders->where('status', 'paid')->sum('total_price') * 100) / $project->price }}%">{{ round(($project->orders->where('status', 'paid')->sum('total_price') * 100) / $project->price,2) > 100 ? 100 : round(($project->orders->where('status', 'paid')->sum('total_price') * 100) / $project->price,2) }}%</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="row g-5">
                    <div class="col-12 mb-5">
                        <div class="card shadow border-0 rounded-4">
                            <div class="card-body vstack gap-3">

                                @if($project->status == 'completed')

                                    <h3 class="text-center text-primary display-3 fw-bold">
                                        <i class="fa-duotone fa-check-circle"></i>
                                        {{__('PROJECT_COMPLETED')}}
                                    </h3>
                                @else

                                <h3>{{__('DONATE_AMOUNT')}}</h3>
                                <form action="{{url('/checkout')}}" class="d-flex flex-column-reverse" method="POST">

                                    <div class="btn-group suggestions mt-3" role="group" aria-label="Basic radio toggle button group">

                                        @for($i = 1 ; $i <= 12 ; $i+=2)
                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio{{$i}}" autocomplete="off" max="{{$project->price}}  value="{{$project->price_one * $i}}">
                                            <label class="btn btn-outline-primary" for="btnradio{{$i}}">{{$project->price_one * $i}}&euro;</label>
                                        @endfor

                                    </div>

                                    <div class="d-flex align-items-center ">
                                        <input type="number" name="price" min="0" class="form-control border-end-0 rounded-end-0"step="any" placeholder="{{__('DONATE_AMOUNT')}}" required value="{{request('amount')}}">

                                        @csrf
                                        <input type="hidden" name="project_id" value="{{$project->id}}" required>
                                        <input type="hidden" name="title" value="{{$project->title}}" required>
                                        <input type="hidden" name="description" value="{{$project->description}}">
                                        <input type="hidden" name="image" value="{{asset('storage/' . $project->thumbnail)}}">
                                        <button type="submit" class="btn btn-primary rounded-start-0">{{__('DONATE')}}</button>
                                    </div>
                                </form>

                                @endif
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-5">
                        <div class="card shadow border-0 rounded-4">
                            <div class="card-body vstack gap-3">

                        <h3>{{__('BANK_DETAILS')}}</h3>
                        <p  class="mb-4">{{__('BENEFICIARY') . ' : ' . __('ORGANISATION_NAME')}}</p>

                        <div class="row g-4">
                            <div class="col-4">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/PostFinance_Logo.svg/1200px-PostFinance_Logo.svg.png" alt="postfinance" class="rounded-5 img-fluid">
                            </div>
                            <div class="col-8">
                                <h5>{{__('CURRENCY') . ' : ' . __('SUISS_FRANC') .  ' CHF'}}</h5>
                                <div class="fw-bold" >IBAN: CH6109000000141852818</div>
                                <div>BIC: POFICHBEXXX</div>
                            </div>

                            <div class="col-4">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/PostFinance_Logo.svg/1200px-PostFinance_Logo.svg.png" alt="postfinance" class="rounded-5 img-fluid">
                            </div>
                            <div class="col-8">
                                <h5>{{__('CURRENCY') . ' : ' . __('EURO')}} &euro;</h5>
                                <div class="fw-bold">IBAN: CH6109000000141852818</div>
                                <div>BIC: POFICHBEXXX</div>
                            </div>

                        </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-12 text-center">

                        <div class="card shadow border-0 rounded-4">
                            <div class="card-body">

                                <h3 class="my-3">{{__('SHARE_PROJECT')}} :</h3>

                                <a href="https://www.facebook.com/sharer.php?u={{url('/projects/' . $project->slug())}}" class="text-decoration-none">
                                    <i class="fa-brands fa-facebook fa-2x me-3"></i>
                                </a>

                                <a href="https://twitter.com/intent/tweet?text={{$project->title()}}&url={{url('/projects/' . $project->slug())}}" class="text-decoration-none">
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


    <script>

        $('.suggestions').on('click',function (event){
            if(event.target.value){
                $('input[name=price]').val(event.target.value)
            }
        })
    </script>

@endsection
