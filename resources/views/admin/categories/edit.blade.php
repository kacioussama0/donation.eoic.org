@extends('admin.layouts.app')
@section('title',__('forms.edit-category'))



@section('content')

    <form action="{{route('categories.update',$category)}}" method="POST">

            @csrf
            @method('PATCH')
        <x-admin.forms.input name="title" title="{{__('forms.category-in-ar')}}" type="text" value="{{$category -> title}}"/>
        <x-admin.forms.input name="title_fr" title="{{__('forms.category-in-fr')}}" type="text" value="{{$category -> title_fr}}"/>
        <x-admin.forms.input name="title_en" title="{{__('forms.category-in-en')}}" type="text" value="{{$category -> title_en}}"/>

        <x-admin.forms.input name="icon" title="{{__('forms.icon')}}" type="file" value="{{old('icon')}}"/>


        <button class="btn btn-primary w-100">{{__('forms.edit-category')}}</button>

    </form>



@endsection
