@php
 $categories = \App\Models\Category::latest()->get();
@endphp

<!doctype html>
<html lang="{{config('app.locale')}}" dir="{{config('app.locale') == 'ar' ? 'rtl' : 'ltr'}}">
<head>



    <meta charset="UTF-8">
    <meta name="title" content="{{ __('APP_NAME') }}">
    <meta name="description" content="{{ __('APP_DESCRIPTION') }}">
    <meta name="keywords" content="تبرع , زكاة  , صدقة , مشاريع , المراكز الإسلامية , الهيئة الأوروبية للمراكز الإسلامية , سويسرا , أيتام">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Arabic">
    <meta name="author" content="Kaci Oussama">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#C4E0E1"/>
    @yield('meta')
    <title>@yield('title') | {{__('APP_NAME')}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
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
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1284935046819696');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1284935046819696&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<body>

    <x-loader></x-loader>

    {{--    Start Header --}}

    <header class="position-relative z-3 py-md-3">
        <nav class="navbar  pt-0   navbar-expand-lg">
            <div class="container bg-primary py-md-1 bg-opacity-10 rounded-5">

                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('imgs/logo.svg')}}" alt="logo" class="logo">
                </a>

                <button class="navbar-toggler p-0" type="button" style="width: 20px" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="sideBar" aria-controls="sideBar" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-light fa-bars fa-1x text-dark" ></i>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">

                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                        <li class="nav-item me-2 ">
                            <a class="nav-link {{request()->route()->named("home") ? 'active' : ''}}" aria-current="page" href="{{url('/')}}">
                                {{__('HOME')}}
                            </a>
                        </li>


                        <li class="nav-item me-2">
                            <a class="nav-link {{request()->route()->named("campaigns") ? 'active' : ''}}" aria-current="page" href="{{url('/campaigns')}}">
                                {{__('CATEGORIES')}}
                            </a>
                        </li>

                        <li class="nav-item me-2">
                            <a class="nav-link {{request()->route()->named("about") ? 'active' : ''}}" aria-current="page" href="https://eoic.org/who-we-are">
                                {{__("ABOUT_US")}}
                            </a>
                        </li>

                        <li class="nav-item me-2">
                            <a class="nav-link " aria-current="page" href="https://eoic.org/contact" target="_blank">
                                {{__('CONTACT_US')}}
                            </a>
                        </li>

                    </ul>


                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item dropdown me-2">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(config('app.locale') == 'ar')
                                    <i class="fi fi-sa"></i> العربية
                                @elseif(config('app.locale') == 'fr')
                                    <i class="fi fi-fr"></i> Français
                                @else
                                    <i class="fi fi-gb"></i> English
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end rounded-4 border-0 shadow-sm">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 {{ config('app.locale') == 'ar' ? 'active bg-primary text-white' : '' }}"
                                       style="{{ config('app.locale') == 'ar' ? 'color: white !important;' : '' }}"
                                       href="{{route('change-lang','ar')}}">
                                        <i class="fi fi-sa"></i> العربية
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 {{ config('app.locale') == 'en' ? 'active bg-primary text-white' : '' }}"
                                       style="{{ config('app.locale') == 'en' ? 'color: white !important;' : '' }}"
                                       href="{{route('change-lang','en')}}">
                                        <i class="fi fi-gb"></i> English
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 {{ config('app.locale') == 'fr' ? 'active bg-primary text-white' : '' }}"
                                       style="{{ config('app.locale') == 'fr' ? 'color: white !important;' : '' }}"
                                       href="{{route('change-lang','fr')}}">
                                        <i class="fi fi-fr"></i> Français
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <a href="{{url('/campaigns')}}" class="btn btn-lg btn-primary px-5 rounded-pill">{{__("DONATE_NOW")}}</a>

                </div>
            </div>
        </nav>
    </header>


    {{--    End Header --}}



<!-- Start OffCanvas -->
<div class="offcanvas side-nav offcanvas-end" data-bs-scroll="true" tabindex="-1" id="sideBar" aria-labelledby="sideBar" style="font-size: 20px;">
    <div class="offcanvas-header d-flex flex-column align-items-center text-center">

        <button type="button" class="btn-close my-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>

        {{-- Brand --}}
        <div class="d-flex align-items-center gap-2 mt-1">
            <img src="{{ asset('imgs/logo.svg') }}" alt="Rahma" style="height:42px" class="rounded-3">

        </div>



    </div>

    <div class="offcanvas-body pt-3">

        <ul class="navbar-nav mx-auto my-2 my-lg-0">

            {{-- Home --}}
            <li class="nav-item pb-2 border-bottom border-primary border-opacity-10">
                <a class="nav-link w-100 fw-bold {{ request()->is('/') ? 'active' : '' }}"
                   href="{{ url('/') }}">
                    {{ __('HOME') }}
                </a>
            </li>

            {{-- Campaigns --}}
            <li class="nav-item pb-2 border-bottom border-primary border-opacity-10">
                <a class="nav-link w-100 fw-bold {{ request()->is('campaigns*') ? 'active' : '' }}"
                   href="{{ url('/campaigns') }}">
                    {{ __('BROWSE_CAMPAIGNS') }}
                </a>
            </li>

            {{-- About --}}
            <li class="nav-item pb-2 border-bottom border-primary border-opacity-10">
                <a class="nav-link w-100 fw-bold {{ request()->is('about*') ? 'active' : '' }}"
                   href="{{ url('/about') }}">
                    {{ __('ABOUT_US') }}
                </a>
            </li>

            {{-- Contact --}}
            <li class="nav-item pb-2 border-bottom border-primary border-opacity-10">
                <a class="nav-link w-100 fw-bold {{ request()->is('contact*') ? 'active' : '' }}"
                   href="{{ url('/contact') }}">
                    {{ __('CONTACT_US') }}
                </a>
            </li>

            {{-- Language --}}
            <li class="nav-item py-3 border-bottom border-primary border-opacity-10">
                <span class="d-flex flex-row-reverse align-items-center">
                    <i class="fa-regular fa-chevron-down ms-auto"></i>
                    <a class="nav-link py-0 w-100"
                       data-bs-toggle="collapse"
                       data-bs-target="#language"
                       aria-expanded="false"
                       aria-controls="language"
                       href="#">
                        @if(config('app.locale') == 'ar')
                            <i class="fi fi-sa"></i>
                        @elseif(config('app.locale') == 'fr')
                            <i class="fi fi-fr"></i>
                        @else
                            <i class="fi fi-gb"></i>
                        @endif
                        <span class="ms-2 text-muted">{{ __('LANGUAGE') }}</span>
                    </a>
                </span>

                <div id="language" class="accordion-collapse collapse mt-2">
                    <div class="accordion-body p-0">
                        <ul class="list-unstyled d-flex gap-3 justify-content-center mb-0">

                            <li>
                                <a class="text-decoration-none {{ config('app.locale') == 'ar' ? 'opacity-50' : '' }}" href="{{ route('change-lang','ar') }}">
                                    <i class="fi fi-sa"></i>
                                </a>
                            </li>

                            <li>
                                <a class="text-decoration-none {{ config('app.locale') == 'en' ? 'opacity-50' : '' }}" href="{{ route('change-lang','en') }}">
                                    <i class="fi fi-gb"></i>
                                </a>
                            </li>

                            <li>
                                <a class="text-decoration-none {{ config('app.locale') == 'fr' ? 'opacity-50' : '' }}" href="{{ route('change-lang','fr') }}">
                                    <i class="fi fi-fr"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>

{{--            --}}{{-- Auth Admin --}}
            @auth
                <li class="nav-item py-2 d-flex flex-row-reverse align-items-center">
                    <i class="fa-regular fa-chevron-down ms-auto"></i>
                    <a class="nav-link w-100"
                       data-bs-toggle="collapse"
                       data-bs-target="#admin"
                       aria-expanded="false"
                       aria-controls="admin"
                       href="#">
                        <i class="fa-solid fa-user"></i>
                        <span class="ms-2 text-muted">{{ __('ACCOUNT') }}</span>
                    </a>
                </li>

                <div id="admin" class="accordion-collapse collapse mt-2">
                    <div class="accordion-body pt-0">
                        <ul class="list-unstyled mb-0">

                            <li class="mb-2">
                                <a href="{{ url('admin') }}" class="text-muted text-decoration-none">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-transparent border-0 text-muted p-0" style="font-size: 20px">
                                        {{ __('LOGOUT') }}
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            @endauth

        </ul>

        {{-- Social --}}
        <div class="d-flex align-items-center justify-content-center my-4 gap-3">
            <a href="#" target="_blank" class="text-decoration-none" style="color: #4267B2"><i class="fa-brands fa-facebook fa-lg"></i></a>
            <a href="#" target="_blank" class="text-decoration-none" style="color: #C13584"><i class="fa-brands fa-instagram fa-lg"></i></a>
            <a href="#" target="_blank" class="text-decoration-none" style="color: #FF0000"><i class="fa-brands fa-youtube fa-lg"></i></a>
            <a href="#" target="_blank" class="text-decoration-none" style="color: #1DA1F2"><i class="fa-brands fa-twitter fa-lg"></i></a>
        </div>

        <div class="text-center small text-muted">
            © {{ now()->year }} Rahma Platform
        </div>

    </div>
</div>
<!-- End OffCanvas -->



    <main>

        @yield('content')

    </main>


<footer class="rahma-footer text-white pt-5 pb-3">
    <div class="container">

        <div class="row g-4 align-items-start">

            <!-- Column 1: Brand / About -->
            <div class="col-12 col-lg-5">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <!-- EOIC logo -->
                    <img src="/imgs/logo-eoic.svg" alt="EOIC" class="footer-logo">

                    <div class="vr footer-vr"></div>

                    <!-- Rahma logo -->
                    <img src="/imgs/logo.svg" alt="Rahma" class="footer-logo">
                </div>

                <p class="footer-text mb-3">
                    {{__("ABOUT_US_DESC")}}
                </p>

                <!-- Social -->
                <div class="d-flex gap-2">
                    <a class="footer-social" href="#" target="_blank" rel="noopener" aria-label="X">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a class="footer-social" href="#" target="_blank" rel="noopener" aria-label="YouTube">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a class="footer-social" href="#" target="_blank" rel="noopener" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a class="footer-social" href="#" target="_blank" rel="noopener" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2: Shortcuts -->
            <div class="col-12 col-lg-3">
                <h6 class="footer-title mb-3">{{__("SHORTCUT")}}</h6>
                <ul class="list-unstyled footer-links mb-0">
                    <li><a href="/" class="footer-link">{{__("HOME")}}</a></li>
                    <li><a href="/campaigns" class="footer-link">{{__("DONATE")}}</a></li>
                    <li><a href="/about" class="footer-link">{{__("ABOUT_US")}}</a></li>
                    <li><a href="/contact" class="footer-link">{{__("CONTACT_US")}}</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact + Policies + Payments -->
            <div class="col-12 col-lg-4">
                <h6 class="footer-title mb-3">{{__("CONTACT_US")}}</h6>

                <ul class="list-unstyled footer-links mb-3">
                    <li class="mb-2">
                        <a href="mailto:info@rahma.ch" class="footer-link">
                            <i class="bi bi-envelope me-2"></i> info@rahma.ch
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="mailto:info@rahma.ch" class="footer-link">
                            <i class="bi bi-envelope me-2"></i> rahma@eoic.org
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="tel:+41782176256" class="footer-link">
                            <i class="bi bi-telephone me-2"></i> +41 78 217 62 56
                        </a>
                    </li>
                </ul>

{{--                <h6 class="footer-title mb-3">الشفافية</h6>--}}
{{--                <ul class="list-unstyled footer-links mb-4">--}}
{{--                    <li><a href="/privacy" class="footer-link">سياسة الخصوصية</a></li>--}}
{{--                    <li><a href="/terms" class="footer-link">الشروط والأحكام</a></li>--}}
{{--                    <li><a href="/refund" class="footer-link">سياسة الاسترجاع</a></li>--}}
{{--                </ul>--}}

                <!-- Payments -->
                <div class="d-flex flex-wrap gap-2 align-items-center mt-3">

                      <span class="pay-icon">
                        <i class="fa-brands fa-apple"></i> Pay
                      </span>

                      <span class="pay-icon">
                        <i class="fa-brands fa-google"></i> Pay
                      </span>

                    <span class="pay-icon">
                        <i class="fa-brands fa-cc-visa"></i>
                    </span>

                    <span class="pay-icon">
                        <i class="fa-brands fa-cc-mastercard"></i>
                    </span>

                </div>

            </div>
        </div>

        <hr class="footer-hr my-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <div class="small footer-copy">
                © <span id="year"></span> Rahma Platform. {{__("ALL_RIGHT_RESERVED")}}
            </div>
            <div class="small footer-copy">
               {{__("APPROVED_BY_EOIC")}}
            </div>
        </div>

    </div>
</footer>

<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>


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


    @if(!session()->has('locale') && !request()->hasCookie('locale'))
        <!-- Language Selection Modal -->
        <div class="modal fade" id="languageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="languageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-5 border-0 shadow-lg">
                    <div class="modal-body p-4 p-md-5 text-center">
                        <img src="{{asset('imgs/logo.svg')}}" alt="logo" class="mb-4" style="height: 60px;">
                        <h3 class="fw-bold mb-4">Choose Your Language / اختر لغتك</h3>
                        <div class="d-grid gap-3">
                            <a href="{{route('change-lang', 'ar')}}" class="btn btn-lg btn-outline-primary rounded-pill d-flex align-items-center justify-content-center gap-3">
                                <i class="fi fi-sa"></i> العربية
                            </a>
                            <a href="{{route('change-lang', 'en')}}" class="btn btn-lg btn-outline-primary rounded-pill d-flex align-items-center justify-content-center gap-3">
                                <i class="fi fi-gb"></i> English
                            </a>
                            <a href="{{route('change-lang', 'fr')}}" class="btn btn-lg btn-outline-primary rounded-pill d-flex align-items-center justify-content-center gap-3">
                                <i class="fi fi-fr"></i> Français
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(window).on('load', function() {
                var myModal = new bootstrap.Modal(document.getElementById('languageModal'));
                myModal.show();
            });
        </script>
    @endif

</body>
</html>
