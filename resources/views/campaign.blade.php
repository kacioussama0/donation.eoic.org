@extends('layouts.app')

@section('title',$campaign->name)


@section('meta')

    <meta property="og:title" content="{{$campaign->name}}"/>
    <meta property="og:image" content="{{asset('storage/' . $campaign->thumbnail)}}"/>
    <meta property="og:site_name" content="{{__('APP_NAME')}}"/>
    <meta property="og:description" content="{{$campaign->description}}"/>
    <meta name="twitter:title" content="{{$campaign->name}}">
    <meta name="twitter:description" content="{{__('APP_NAME')}}">
    <meta name="twitter:image" content="{{asset('storage/' . $campaign->thumbnail)}}">
    <meta name="twitter:card" content="summary_large_image">

@endsection


@section('content')
    <div class="container  my-4">
        <div class="row g-lg-5">
            <div class="col-md-6">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body vstack gap-3">
                        <h3>التفاصيل</h3>

                        <img src="{{$campaign->thumbnail}}" alt=""
                             class="img-fluid w-100 rounded-5">

                        <h1 class="fw-bolder mb-0">{{$campaign->name}}</h1>
                        <p class="p-3 bg-primary bg-opacity-10">{!! $campaign->description !!}</p>

                        <div class="row">
                            <div class="col-md-6">
                                <h6>تم جمع</h6>
                                <span class="text-primary fw-bold">{{ $campaign->collected_amount}} &euro;</span>
                            </div>
                            <div class="col-md-6">
                                <h6>المبلغ المتبقي</h6>
                                <span class="text-primary fw-bold">{{$campaign->target_amount - $campaign->collected_amount < 0 ? 0 : $campaign->target_amount - $campaign->collected_amount}} &euro;</span>
                            </div>
                        </div>
                        <div class="progress" role="progressbar" aria-label="Animated striped example"
                             aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                 style="width: {{ $campaign->progress_percentage }}%">{{ $campaign->progress_percentage }}%
                                %
                            </div>
                        </div>

                        <div class="row my-3 gy-4">
                            <div class="col-md-6 hstack gap-3">
                                <i class="fa-duotone fa-timer fa-2x"></i>
                                <span>
                                    <h6 class="text-primary fw-bold">آخر عملية تبرع</h6>
                                    @if($latestDonation)
                                        <span>
                                            {{ $latestDonation->created_at->locale('ar')->diffForHumans() }}
                                        </span>
                                    @else
                                        <span>لا توجد تبرعات بعد</span>
                                    @endif

                                </span>
                            </div>

                            <div class="col-md-6 hstack gap-3">
                                <i class="fa-duotone fa-eye fa-2x"></i>
                                <span>
                                    <h6 class="text-primary fw-bold">الزيارات</h6>
                                    @if($campaign->visitors > 0)
                                        <span>
                                            {{ $campaign->visitors }} زيارة
                                        </span>
                                    @else
                                        <span>لا زيارات</span>
                                    @endif

                                </span>
                            </div>


                            <div class="col-md-6 hstack gap-3">
                                <i class="fa-duotone fa-donate fa-2x"></i>
                                <span>
                                    <h6 class="text-primary fw-bold">عدد عمليات التبرع</h6>
                                    @if($campaign->donations->count() > 0)
                                        <span>
                                            {{ $campaign->donations->count() }}  عملية
                                        </span>
                                    @else
                                        <span>لا توجد اي عملية</span>
                                    @endif

                                </span>
                            </div>


                            <div class="col-md-6 hstack gap-3">
                                <i class="fa-duotone fa-users fa-2x"></i>
                                <span>
                                    <h6 class="text-primary fw-bold">عدد المستفيدين</h6>
                                    @if($campaign->donations->count() > 0)
                                        <span>
                                            {{ $campaign->donations->count() }}  مستفيد
                                        </span>
                                    @else
                                        <span>لا توجد اي مستفيد</span>
                                    @endif

                                </span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="row g-5">
                    <div class="col-12 mb-5">
                        <div class="card shadow border-0 rounded-4">
                            <div class="card-body vstack gap-3">

                                @if($campaign->status == 'completed')

                                    <h3 class="text-center text-primary display-3 fw-bold">
                                        <i class="fa-duotone fa-check-circle"></i>
                                        {{__('PROJECT_COMPLETED')}}
                                    </h3>
                                @else

                                    <h3>{{__('DONATE_AMOUNT')}}</h3>
                                    <form action="{{url('/donate')}}" class="d-flex flex-column-reverse"
                                          method="POST">


                                        <div >



                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">€</span>
                                                <input type="number" name="price" min="1"
                                                       class="form-control text-start"  step="any"
                                                       placeholder="{{__('DONATE_AMOUNT')}}" required
                                                       value="{{request('amount')}}">                                            </div>

                                            @csrf
                                            <input type="hidden" name="campaign_id" value="{{$campaign->id}}" required>
                                            <input type="hidden" name="title" value="{{$campaign->name}}" required>
                                            <input type="hidden" name="description" value="{{$campaign->description}}">
                                            <input type="hidden" name="image"
                                                   value="{{ $campaign->thumbnail}}">
                                            <button type="submit" class="btn btn-primary d-block w-100 my-3">{{__('DONATE')}}</button>
                                        </div>



                                        <div class="btn-group suggestions my-3" role="group"
                                             aria-label="donate money suggestions">

                                            @for($i = 1 ; $i <= 5 ; $i+=2)
                                                <input type="radio" class="btn-check" name="btnradio"
                                                       id="btnradio{{$i}}" autocomplete="off"
                                                       max="{{$campaign->target_amount}}" value="{{$campaign->price_one * $i}}">
                                                <label class="btn btn-outline-primary" for="btnradio{{$i}}">{{$campaign->price_one * $i}}&euro;</label>
                                            @endfor


                                        </div>

                                    </form>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-5">
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-body  gap-3">

                            <h3>{{__('BANK_DETAILS')}}</h3>
                            <p class="mb-4">{{__('BENEFICIARY') . ' : ' . __('ORGANISATION_NAME')}}</p>

                            <div class="row  align-items-center g-4">
                                <div class="col-4">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/PostFinance_Logo.svg/1200px-PostFinance_Logo.svg.png"
                                         alt="postfinance" class="rounded-5 img-fluid">
                                </div>
                                <div class="col-8">
                                    <h5>{{__('CURRENCY') . ' : ' . __('SUISS_FRANC') .  ' CHF'}}</h5>
                                    <div class="fw-bold">IBAN: CH6109000000141852818</div>
                                    <div>BIC: POFICHBEXXX</div>
                                </div>

                                <div class="col-4">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/PostFinance_Logo.svg/1200px-PostFinance_Logo.svg.png"
                                         alt="postfinance" class="rounded-5 img-fluid">
                                </div>
                                <div class="col-8">
                                    <h5>{{__('CURRENCY') . ' : ' . __('EURO')}} &euro;</h5>
                                    <div class="fw-bold">IBAN: CH6109000000141852818</div>
                                    <div>BIC: POFICHBEXXX</div>
                                </div>

                                <div class="col-4">
                                    <img src="https://www.top-bank.ch/images/logo_540/xtwint.png.pagespeed.ic.8QqzZgUxQo.webp" alt="twint" class="img-fluid rounded-5">
                                </div>
                                <div class="col-8">
                                    <div class="fw-bold">TWINT: 078.873.44.80</div>
                                    <div>سويسرا فقط</div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-12 text-center">

                    <div class="card shadow border-0 rounded-4">
                        <div class="card-body">

                            <h3 class="my-3">{{__('SHARE_PROJECT')}} :</h3>

                            <a href="https://www.facebook.com/sharer.php?u={{url('/projects/' . $campaign->slug)}}"
                               class="text-decoration-none">
                                <i class="fa-brands fa-facebook fa-2x me-3"></i>
                            </a>

                            <a href="https://twitter.com/intent/tweet?text={{$campaign->title}}&url={{url('/projects/' . $campaign->slug)}}"
                               class="text-decoration-none">
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



        $('.suggestions').on('click', function (event) {
            if (event.target.value) {
                $('input[name=price]').val(event.target.value)
            }
        })
    </script>

@endsection
