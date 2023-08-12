@extends('layouts.header')

@section('content')
    <div class="container  ">
        <div class="row justify-content-center ">

            <div class="card border-0 rounded-0">

                <div class="row align-items-center flex-row-reverse p-lg-5 p-0">

                    <div class="col-6 mx-auto mb-2 mb-lg-0 col-lg-7" >
                        <img src="{{asset('assets/imgs/login.svg')}}" alt=""  class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="card-body">
                            <h1 class="mb-5  text-dark text-center fw-light"></h1>
                            <form method="POST" action="{{ route('login') }}" >
                                @csrf


                                <div class=" form-floating mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="email" >{{__('forms.email')}}</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>




                                <div class=" form-floating">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <label for="password" >{{__('forms.password')}}</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>






                                @if (Route::has('password.request'))
                                    <a class="btn btn-link my-3" href="{{ route('password.request') }}">
                                        {{__('forms.forgot-password-?')}}
                                    </a>
                                @endif



                                <button type="submit" class="btn btn-primary d-block w-100">
                                    {{__('forms.log-in')}}
                                </button>

                            </form>
                        </div>


                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
@endsection
