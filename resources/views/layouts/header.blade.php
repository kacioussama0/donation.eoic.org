@php
 $categories = \App\Models\Category::latest()->get();
@endphp

<!doctype html>
<html lang="{{session()->get('locale')}}" dir="@if(session()->get('lang-ltr')){{'ltr'}}@else{{'rtl'}}@endif">
<head>



    <meta charset="UTF-8">
    <meta name="title" content="منصة الهيئة الأوروبية للتبرعات">
    <meta name="description" content="هيئة متخصصة في العناية بشؤون المراكز الإسلامية في أوروباأُسست وفقاً للمادة (60) من القانون المدني السويسري ">
    <meta name="keywords" content="تبرع , زكاة  , صدقة , مشاريع , المراكز الإسلامية , الهيئة الأوروبية للمراكز الإسلامية , سويسرا , أيتام">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Arabic">
    <meta name="author" content="Kaci Oussama">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#C4E0E1"/>
    @yield('meta')
    <title>{{__('APP_NAME')}} | @yield('title')</title>

    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Rahma | رحمة" />
    <link rel="manifest" href="/site.webmanifest" />

    <link rel="shortcut icon" href="{{asset('imgs/logo.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @if(config('app.locale') == 'ar')
        <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css"/>
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>
    <script>
        $(window).on('load',function(){
            $('.loader-container').fadeOut();
            $('body').removeClass('overflow-hidden');
        });
    </script>
</head>
<body>

{{--    <x-loader></x-loader>--}}

    {{--    Start Header --}}

    <header class="position-relative z-3">
        <nav class="navbar  navbar-expand-lg">
            <div class="container">

                <a class="navbar-brand me-5" href="#">
                    <img src="{{asset('imgs/logo.svg')}}" alt="logo" class="logo">
                </a>

                <button class="navbar-toggler p-0" type="button" style="width: 20px" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="sideBar" aria-controls="sideBar" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-light fa-bars fa-1x text-dark" ></i>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">

                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-bold">
                        <li class="nav-item me-2 ">
                            <a class="nav-link " aria-current="page" href="{{url('/')}}">
                                {{__('HOME')}}
                            </a>
                        </li>


                        <li class="nav-item me-2">
                            <a class="nav-link " aria-current="page" href="{{url('/categories')}}">
                                {{__('CATEGORIES')}}
                            </a>
                        </li>

                        <li class="nav-item me-2">
                            <a class="nav-link " aria-current="page" href="{{url('about')}}">
                                {{__('ABOUT_US')}}
                            </a>
                        </li>

                        <li class="nav-item me-2">
                            <a class="nav-link " aria-current="page" href="https://eoic.org/contact" target="_blank">
                                {{__('CONTACT_US')}}
                            </a>
                        </li>

                    </ul>


                    <ul class="m-0 d-none d-lg-block ms-auto">


                        <div class="btn-group">
                            <button class="btn btn-transparent rounded-0 dropdown-toggle" type="button" data-bs-toggle="collapse" href="#languageSwitcher" role="button" aria-expanded="false" aria-controls="languageSwitcher">

                                @if(session()->get('locale') == 'ar')
                                    <i class="fi fi-sa"></i>
                                @elseif(session()->get('locale') == 'fr')
                                    <i class="fi fi-fr"></i>
                                @else
                                    <i class="fi fi-gb"></i>
                                @endif

                            </button>


                            <div class="collapse position-absolute w-100 start-50 mt-5 translate-middle-x bg-white top-0 text-center" id="languageSwitcher" >
                                <div class="py-2">
                                    <div class="@if(session()->get('locale') == 'ar') d-none @endif">
                                        <a href="{{route('change-lang','ar')}}">
                                            <i class="fi fi-sa"></i>
                                        </a>
                                    </div>

                                    <div class="@if(session()->get('locale') == 'en') d-none @endif">
                                        <a href="{{route('change-lang','en')}}">
                                            <i class="fi fi-gb"></i>
                                        </a>
                                    </div>

                                    <div class="@if(session()->get('locale') == 'fr') d-none @endif">
                                        <a href="{{route('change-lang','fr')}}">
                                            <i class="fi fi-fr"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>

{{--                        <li class="nav-item btn   border-0">--}}
{{--                            <div id="donate-button" class="d-flex justify-content-center"></div>--}}
{{--                        </li>--}}
                    </ul>

                </div>
            </div>
        </nav>
    </header>


    {{--    End Header --}}



    <!-- Start OffCanvas -->

    <div class="offcanvas side-nav offcanvas-end " data-bs-scroll="true" tabindex="-1" id="sideBar" aria-labelledby="sideBar" style="font-size: 20px;"  >
        <div class="offcanvas-header d-flex flex-column align-items-center">
            <button type="button" class="btn-close my-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            <h5 class="offcanvas-title text-center mt-2" id="offcanvasWithBothOptionsLabel">منصة الهيئة الأوروبية للتبرعات</h5>

        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav mx-auto my-2 my-lg-0 ">

                <li class="nav-item {{request()->is('/') ? "active" : '' }} link-primary pb-2 border-bottom border-primary border-opacity-10">
                    <a class="nav-link w-100 fw-bold {{request()->is('/') ? "active" : '' }}" aria-current="page" href="{{url('/')}}">{{__('HOME')}}</a>
                </li>


                <li class="nav-item {{request()->is('/') ? "active" : '' }} link-primary pb-2 border-bottom border-primary border-opacity-10">
                    <a class="nav-link w-100 fw-bold {{request()->is('/') ? "active" : '' }}" aria-current="page" href="https://eoic.org/contact">{{__('CONTACT_US')}}</a>
                </li>

                <li class="nav-item {{request()->is('/') ? "active" : '' }} link-primary pb-2 border-bottom border-primary border-opacity-10">
                    <a class="nav-link w-100 fw-bold {{request()->is('/') ? "active" : '' }}" aria-current="page" href="{{url('/about')}}">{{__('ABOUT_US')}}</a>
                </li>


                <li class="nav-item py-3  @auth   border-bottom border-primary border-opacity-10  @endauth">

                <span class="d-flex flex-row-reverse align-items-center">
                       <i class="fa-regular fa-chevron-down ms-auto"></i>
                <a class="nav-link py-0 w-100" aria-current="page" data-bs-toggle="collapse" data-bs-target="#language" aria-expanded="true" aria-controls="language" href="#">
                    @if(session()->get('locale') == 'ar')
                        <i class="fi fi-sa"></i>
                    @elseif(session()->get('locale') == 'fr')
                        <i class="fi fi-fr"></i>
                    @else
                        <i class="fi fi-gb"></i>
                    @endif
                </a>
                </span>


                    <div id="language" class="accordion-collapse collapse" aria-labelledby="language">
                        <div class="accordion-body">
                            <ul>

                                <li class=" @if(session()->get('locale') == 'ar') d-none @endif">
                                    <a href="{{route('change-lang','ar')}}">
                                        <i class="fi fi-sa"></i>
                                    </a>
                                </li>

                                <li class=" @if(session()->get('locale') == 'en') d-none @endif">

                                    <a href="{{route('change-lang','en')}}">
                                        <i class="fi fi-gb"></i>
                                    </a>
                                </li>

                                <li class="d-flex align-items-center @if(session()->get('locale') == 'fr') d-none @endif">
                                    <a href="{{route('change-lang','fr')}}">
                                        <i class="fi fi-fr"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </li>

                @auth

                    <li class="nav-item py-2 d-flex flex-row-reverse align-items-center">
                        <i class="fa-regular fa-chevron-down ms-auto"></i>
                        <a class="nav-link w-100" aria-current="page" data-bs-toggle="collapse" data-bs-target="#admin" aria-expanded="true" aria-controls="admin" href="#">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    </li>


                    <div id="admin" class="accordion-collapse collapse" aria-labelledby="admin">
                        <div class="accordion-body">
                            <ul >

                                <li class="ms-3">
                                    <a href="{{url('admin')}}" class="text-muted">
                                        {{__('لوحة التحكم')}}
                                    </a>
                                </li>

                                <li  class="ms-3">
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-transparent border-0 text-muted" style="font-size: 20px">خروج</button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>

                @endauth

            </ul>

            <div class="d-flex align-items-center justify-content-center my-3">
                <a href="https://www.facebook.com/MEDIA.EOIC/" target="_blank" class="me-3" style="color: #4267B2"><i class="fa-brands fa-facebook fa-1x"></i></a>
                <a href="https://www.instagram.com/eoic_geneva/" target="_blank" class="me-3" style="color: #C13584"><i class="fa-brands fa-instagram fa-1x"></i></a>
                <a href="https://www.youtube.com/channel/UCi_iTZfHrRN19Wtwo4vM4EA?view_as=subscriber" target="_blank" class="me-3" style="color: #FF0000"><i class="fa-brands fa-youtube fa-1x"></i></a>
                <a href="https://twitter.com/EOIC_Geneva" target="_blank" class="me-3" style="color: #1DA1F2"><i class="fa-brands fa-twitter f-1x"></i></a>
            </div>

        </div>
    </div>

    <!-- End OffCanvas -->



    <main>

        @yield('content')

    </main>


    {{--  Start Footer  --}}

    <footer class="bg-primary py-4">

            <div class="container text-white">

                <div class="row gy-md-3 align-items-center justify-content-center">

                    <h6 class="mb-md-0 text-white fw-bold text-center  col-lg-4">{!! (__('ALL_RIGHT_RESERVED')) . ' '  . __('APP_NAME') . ' '  . date('Y') . '  ' !!}</h6>

                    <div class="col-lg-4">
                        <div class="d-flex align-items-center justify-content-center ">
                            <i class="fa-brands fa-cc-visa fa-2x me-3 text-white"></i>
                            <i class="fa-brands fa-cc-mastercard fa-2x me-3 text-white"></i>
                            <i class="fa-brands fa-apple-pay fa-2x me-3 text-white"></i>
                            <i class="fa-brands fa-google-pay fa-2x me-3 text-white"></i>
                        </div>
                    </div>

                    <div class="col-lg-4">

                        <div class="d-flex align-items-center justify-content-center ">
                            <a href="https://www.facebook.com/MEDIA.EOIC/" target="_blank" class="me-3 text-white" ><i class="fa-brands fa-facebook fa-1x"></i></a>
                            <a href="https://www.instagram.com/eoic_geneva/" target="_blank" class="me-3 text-white" ><i class="fa-brands fa-instagram fa-1x"></i></a>
                            <a href="https://www.youtube.com/channel/UCi_iTZfHrRN19Wtwo4vM4EA?view_as=subscriber" target="_blank" class="me-3 text-white" ><i class="fa-brands fa-youtube fa-1x"></i></a>
                            <a href="https://twitter.com/EOIC_Geneva" target="_blank" class="me-3 text-white" ><i class="fa-brands fa-twitter fa-1x"></i></a>
                        </div>
                    </div>


                </div>

            </div>

    </footer>

    {{--        End Footer  --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{asset('fontawesome/js/all.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>

    <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
    <script>
        PayPal.Donation.Button({
            env:'production',
            hosted_button_id:'X3HWJZC5KPT4U',
            image: {
                alt:'Donate with PayPal button',
                title: '{{__('DONATE_NOW')}}',
            }
        }).render('#donate-button');
    </script>

</body>
</html>
