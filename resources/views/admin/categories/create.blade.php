@extends('admin.layouts.app')
@section('title',__('forms.add-category'))



@section('content')

    <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

        <x-admin.forms.input name="title" title="{{__('forms.category-in-ar')}}" type="text" value="{{old('title')}}"/>
        <x-admin.forms.input name="title_fr" title="{{__('forms.category-in-fr')}}" type="text" value="{{old('title_fr')}}"/>
        <x-admin.forms.input name="title_en" title="{{__('forms.category-in-en')}}" type="text" value="{{old('title_en')}}"/>
        <x-admin.forms.input name="icon" title="{{__('forms.icon')}}" type="file" value="{{old('icon')}}"/>





        <button class="btn btn-primary w-100">{{__('forms.add-category')}}</button>

    </form>



@endsection
