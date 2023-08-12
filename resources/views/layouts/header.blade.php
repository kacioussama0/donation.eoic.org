@php
 $categories = \App\Models\Category::latest()->get();
@endphp

<!doctype html>
<html lang="{{session()->get('locale')}}" dir="@if(session()->get('locale') == 'ar'){{'rtl'}}@else{{'ltr'}}@endif">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}} | @yield('title')</title>
    <link rel="shortcut icon" href="{{asset('imgs/logo.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <meta name="robots" content="index, follow">
    <meta name="robots" content="all"/>
    <meta name="robots" content="noindex"/>
    <meta name="robots" content="nofollow"/>
    <meta name=”robots” content="noindex, nofollow">
    <meta name=”robots” content="index, follow">
    <meta name="robots" content="none"/>
    <meta name="robots" content="noarchive"/>
    <meta name="robots" content="notranslate"/>
    <meta name="robots" content="noimageindex"/>
    <meta name="robots" content="nosnippet"/>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>
    <script>
        $(window).on('load',function(){
            $('.loader-container').fadeOut();
            $('body').removeClass('overflow-hidden');
        });
    </script>
</head>
<body>

    <x-loader></x-loader>

    {{--    Start Header --}}

    <header class="shadow-sm position-relative z-3">
        <nav class="navbar h-100 navbar-expand-lg">
            <div class="container">
                <div class="brand d-flex align-items-center">
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('imgs/logo.png')}}" alt="logo" class="logo">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">

                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-normal">
                        <li class="nav-item me-2">
                            <a class="nav-link active fw-bold" aria-current="page" href="{{url('/')}}">
                                الرئيسية
                            </a>
                        </li>

                        <li class="nav-item me-2">
                            <a class="nav-link active fw-bold" aria-current="page" href="{{url('/projects')}}">
                                المشاريع
                            </a>
                        </li>


                        <li class="nav-item dropdown  fw-bold z-3">
                            <a href="#" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                فرص التبرع
                            </a>
                            <ul class="dropdown-menu dropdown-menu">
                                @foreach($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="{{$category->slug}}">
                                        <img src="{{asset('storage/' . $category->icon)}}" alt="" style="width: 20px">
                                            {{$category->title}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>


                        <li class="nav-item me-2">
                            <a class="nav-link active fw-bold" aria-current="page" href="{{url('about')}}">
                                عن الهيئة
                            </a>
                        </li>

                    </ul>


                    <ul class="m-0">
                        <li class="nav-item btn btn-primary btn-lg bg-gradient  border-0">
                            <a class="nav-link active  text-light" aria-current="page" href="#">تبرع الأن</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>


    {{--    End Header --}}


    <main>

        @yield('content')

    </main>




    {{--    Start Footer  --}}
    <div class="text-white user-select-none  bg-primary position-relative top-0 py-3 py-md-0 ">
        <div class="container-lg d-flex flex-column flex-md-row justify-content-between align-items-center py-3">
            <h6 class="mb-3 mb-md-0 text-white fw-bold">كل الحقوق محفوظة منصة الهيئة الأوروبية للتبرعات 2023</h6>

            <div class="d-flex align-items-center justify-content-center ">
                <a href="https://www.facebook.com/MEDIA.EOIC/" target="_blank" class="me-3 text-white" ><i class="fa-brands fa-facebook fa-1x"></i></a>
                <a href="https://www.instagram.com/eoic_geneva/" target="_blank" class="me-3 text-white" ><i class="fa-brands fa-instagram fa-1x"></i></a>
                <a href="https://www.youtube.com/channel/UCi_iTZfHrRN19Wtwo4vM4EA?view_as=subscriber" target="_blank" class="me-3 text-white" ><i class="fa-brands fa-youtube fa-1x"></i></a>

                <a href="https://twitter.com/EOIC_Geneva" target="_blank" class="me-3 text-white" ><i class="fa-brands fa-twitter fa-1x"></i></a>
            </div>
        </div>
    </div>

    {{--    End Footer  --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{asset('fontawesome/js/all.min.js')}}"></script>



</body>
</html>
