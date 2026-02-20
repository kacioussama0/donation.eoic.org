@extends('layouts.app')

@section('title', 'تبرع لحملة ' . $campaign->name)

@section('meta')

    {{-- SEO --}}
    <meta name="description"
          content="{{ Str::limit(strip_tags($campaign->description), 160) }}">

    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="تبرع لحملة {{ $campaign->name }}"/>
    <meta property="og:description"
          content="{{ Str::limit(strip_tags($campaign->description), 200) }}"/>
    <meta property="og:image"
          content="{{ asset('storage/' . $campaign->thumbnail) }}"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:site_name" content="{{ config('app.name') }}"/>
    <meta property="og:locale" content="ar_AR"/>

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="تبرع لحملة {{ $campaign->name }}">
    <meta name="twitter:description"
          content="{{ Str::limit(strip_tags($campaign->description), 200) }}">
    <meta name="twitter:image"
          content="{{ asset('storage/' . $campaign->thumbnail) }}">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:site" content="@rahma">


    <script type="application/ld+json">
        {
                  "@context": "https://schema.org",
                  "@type": "DonateAction",
                  "name": "{{ $campaign->name }}",
          "description": "{{ Str::limit(strip_tags($campaign->description), 200) }}",
          "url": "{{ url()->current() }}",
          "image": "{{ asset('storage/' . $campaign->thumbnail) }}",
          "provider": {
            "@type": "Organization",
            "name": "{{ config('app.name') }}"
          }
        }
    </script>


@endsection



@section('content')
    <div class="container  my-4">
        <div class="row gy-3 g-lg-5">
            <div class="col-md-6">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body vstack gap-3">
                        <h3>التفاصيل</h3>


                        <div class="position-relative">

                            <img src="{{$campaign->thumbnail}}" alt=""
                                 class="img-fluid w-100 rounded-5" style="filter: blur({{$campaign->collected_amount >= $campaign->target_amount ? 2 : 0}}px)">

                            @if($campaign->collected_amount >= $campaign->target_amount)
                                            <img src="/imgs/complete-badge.svg"  alt="" width="300" height="300"  class="position-absolute start-50 top-50 translate-middle">

                            @endif
                        </div>

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
                                <i class="fa-duotone fa-calendar-arrow-up fa-2x"></i>
                                <span>
                                    <h6 class="text-primary fw-bold">تاريخ النشر</h6>
                                    <span>{{ $campaign->created_at->locale('ar')->translatedFormat('l, d F Y') }}</span>

                                </span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="row gy-3 g-lg-5">
                    <div class="col-12 mb-5">
                        <div class="card shadow border-0 rounded-4">
                            <div class="card-body vstack gap-3">

                                @if($campaign->collected_amount >= $campaign->target_amount)

                                    <h3 class="text-center text-primary fw-bold display-4">
                                        <i class="fa-duotone fa-check-circle"></i>
                                        تم تحقيق الهدف
                                    </h3>
                                @else



                                    <h3>{{__('DONATE_AMOUNT')}}</h3>

                                    @if(session('stripe_error'))
                                        <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                                            {{ session('stripe_error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif

                                    @if(request('payment') === 'cancelled')
                                        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                                            تم إلغاء عملية الدفع.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif




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

                    @php
                        $shareUrl = url('/campaigns/' . $campaign->slug);
                        $shareTitle = urlencode($campaign->title);
                        $encodedUrl = urlencode($shareUrl);
                    @endphp

                    <div class="card shadow border-0 rounded-4">
                        <div class="card-body py-4">

                            <h5 class="fw-bold mb-4">شارك الحملة على</h5>

                            <div class="d-flex justify-content-center gap-4 flex-wrap">

                                {{-- Facebook --}}
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}"
                                   target="_blank"
                                   class="share-btn facebook">
                                    <i class="fa-brands fa-facebook-f "></i>
                                </a>

                                {{-- Twitter (X) --}}
                                <a href="https://twitter.com/intent/tweet?text={{ $shareTitle }}&url={{ $encodedUrl }}"
                                   target="_blank"
                                   class="share-btn twitter">
                                    <i class="bi bi-twitter-x"></i>
                                </a>

                                {{-- WhatsApp --}}
                                <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $encodedUrl }}"
                                   target="_blank"
                                   class="share-btn whatsapp">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>

                                {{-- Telegram --}}
                                <a href="https://t.me/share/url?url={{ $encodedUrl }}&text={{ $shareTitle }}"
                                   target="_blank"
                                   class="share-btn telegram">
                                    <i class="fa-brands fa-telegram"></i>
                                </a>

                            </div>

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
