@extends('admin.layouts.app')
@section('title',__('forms.profile'))



@section('content')


    @include('admin.layouts.success')
    @include('admin.layouts.failed')

    <div class="row g-3 align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('updateProfile')}}" method="POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">
                        @csrf
                        <x-admin.forms.input name="name" title="{{__('forms.full-name')}}" type="text" value="{{$user -> name}}"/>
                        <x-admin.forms.input name="email" title="{{__('forms.email')}}" type="email" value="{{$user -> email}}"/>
                        <button class="btn btn-primary w-100">{{__('forms.edit-information')}}</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">

                <div class="card-body d-flex align-items-center">

                    <img src="{{File::exists(public_path('storage/' . $user -> avatar)) ? asset('storage/' . $user -> avatar) : asset('assets/imgs/logo.svg') }}" alt="" class="me-3 rounded-circle" style="object-fit: cover ; height: 150px ; width: 150px">

                    <form action="{{route('updateImage')}}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('{{__('forms.you-sure')}}')">
                        @csrf
                        @method('PATCH')
                        <x-admin.forms.input name="image" title="{{__('forms.picture')}}" type="file" value="{{old('image')}}"/>
                        <button class="btn btn-warning w-100">{{__('forms.edit-picture')}}</button>
                    </form>

                </div>

            </div>

        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('updatePassword')}}" method="POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">

                        @csrf

                        <x-admin.forms.input name="actual_password" title="{{__('forms.current-password')}}" type="password" value="{{old('actual_password')}}"/>
                        <x-admin.forms.input name="new_password" title="{{__('forms.new-password')}}" type="password" value="{{old('new_password')}}"/>
                        <x-admin.forms.input name="new_password_confirmation" title="{{__('forms.confirme-password')}}" type="password" value="{{old('new_password_confirmation')}}"/>

                        <button class="btn btn-primary w-100">{{__('forms.edit-password')}}</button>

                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection
