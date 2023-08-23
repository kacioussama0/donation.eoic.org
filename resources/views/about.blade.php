@extends('layouts.header')

@section('title','عن الهيئة')


@section('content')

    <div class="about-header position-relative text-light">

        <div class="container d-flex align-items-center h-100">

            <div class="row">
                <div class="col-lg-6 col-12">

                    <div class=" vstack gap-3 text-lg-start text-center">
                        <h1>عن الهيئة</h1>
                        <h3>الإسم : الهيئة الأوروبية للمراكز الإسلامية</h3>
                        <h5>الشعار : رعاية وارتقاء</h5>

                        <p>
                            هي هيئة متخصصة في العناية بشؤون المراكز الإسلامية في أوروبا.
                            أُسست وفقاً للمادة (60) وما يتلوها من المواد المتعلقة بتأسيس الجمعيات، من القانون المدني السويسري، بمبادرة من شخصيات دعوية من عدة أقطار أوروبية. وهي جمعية خيرية تطوعية، غير حكومية، مستقلة، وتسعى للعمل وفق رؤية واضحة وأهداف مرسومة وخطوات مدروسة، ووسائل معلنه.
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <div class="goals py-5">


        <div class="container">

            <div class="row text-center g-5">


                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0  h-100">
                        <div class="card-body vstack gap-3 justify-content-center align-items-center">
                            <i class="fa-duotone fa-3x fa-eye text-primary"></i>
                            <h3>الرؤية</h3>
                            <p>
                                التميز في خدمة المراكز الإسلامية للارتقاء بها وتطوير أداءها.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0  h-100">
                        <div class="card-body vstack gap-3 justify-content-center align-items-center">
                            <i class="fa-duotone fa-3x fa-bullseye-arrow text-primary"></i>
                            <h3>الهدف</h3>
                            <p>
                                العناية بالمراكز الإسلامية، ومرافقتها للتطور والارتقاء.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0  h-100">
                        <div class="card-body vstack gap-3 justify-content-center align-items-center">
                            <i class="fa-duotone fa-3x fa-message text-primary"></i>
                            <h3>الرسالة</h3>
                            <p>
                                الارتقاء بدور المراكز الإسلامية في أوروبا، وتطوير وسائلها، وتوسيع نطاق أعمالها، لتستجيب لحاجات وتطلعات مسلمي أوروبا، وللقيام بدور ريادي ضمن مؤسسات المجتمع المدني الأوروبي.
                            </p>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>


    <div class="goals py-5 bg-primary bg-opacity-25">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <img src="{{asset('imgs/ziyan.jpg')}}" alt="" height="400" class="rounded-5 img-fluid shadow-sm">
                </div>

                <div class="col-6">
                    <h3 class="fw-bold">رئيس الهيئة الأوروبية للمراكز الإسلامية</h3>
                    <p>معالي الشيخ : زيان مهاجري</p>
                </div>
            </div>

        </div>
    </div>

@endsection
