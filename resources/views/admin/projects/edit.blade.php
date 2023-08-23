@extends('admin.layouts.app')
@section('title',__('forms.edit-project'))



@section('content')


    <div class="card">
        <div class="card-body">

            <form action="{{route('projects.update',$project)}}" method="POST" enctype="multipart/form-data" class="mt-3">


                @csrf
                @method('PUT')
                <span class="fi fi-sa  mx-auto d-block" style="width: 70px; height: 70Px"></span>


                <x-admin.forms.input name="title" title="{{__('forms.title')}}" type="text" value="{{$project->title}}"/>

                <div class="form-group">
                    <label for="category" class="form-label">{{__('home.categories')}}</label>
                    <select name="category" id="category" class="form-select">
                        @foreach($categories as $category)
                            <option @if($category->id ==  $project->category_id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>


                <x-admin.forms.input name="thumbnail" title="{{__('forms.picture')}}" type="file" value="{{$project->thumbnail}}"/>

                <img src="{{asset('storage/' . $project -> thumbnail )}}" alt="" style="width: 100px">

                <x-admin.forms.text-area name="description" id="#content" class="content" title="article-content-ar"  value="{!!$project->description!!}"/>
                <hr>
                <span class="fi fi-gb  mx-auto d-block" style="width: 70px; height: 70Px"></span>

                <x-admin.forms.input name="title_en" title="{{__('forms.title-in-en')}}" type="text" value="{{$project-> title_en}}"/>
                <x-admin.forms.text-area name="description_en" id="content_1" title="article-content-en"  value="{!! $project->description_en !!}"/>
                <hr>

                <span class="fi fi-fr mx-auto d-block" style="width: 70px; height: 70Px"></span>

                <x-admin.forms.input name="title_fr" title="{{__('forms.title-in-fr')}}" type="text" value="{{$project->title_fr}}"/>
                <x-admin.forms.text-area name="description_fr" id="content_2" title="article-content-fr"  value="{!!$project->description_fr!!}"/>

                <x-admin.forms.input name="price" title="{{__('forms.price')}}" type="number" value="{{$project->price}}"/>
                <x-admin.forms.input name="price_one" title="{{__('forms.price_one')}}" type="number" value="{{$project->price_one}}"/>


                <div class="mb-3">
                    <label for="created_at">{{__('أنشا')}}</label>
                    <input type="datetime-local" class="form-control" name="created_at" value="{{$project->created_at}}">
                </div>

                <div class="mb-3">
                    <label for="status">{{__('الحالة')}}</label>
                    <select name="status" id="status" class="form-control">
                        <option value="open" @if($project->status == 'open') selected @endif>مفتوح</option>
                        <option value="hidden" @if($project->status == 'hidden') selected @endif>مختفي</option>
                        <option value="completed" @if($project->status == 'completed') selected @endif>مكتمل</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">{{__('forms.edit-articles')}}</button>
            </form>

        </div>
    </div>


    <script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>


    <script>ClassicEditor
            .create( document.querySelector( '#description' ), {

                licenseKey: '',

                ckfinder: {
                    uploadUrl: "{{route('projects.uploadImage') . '?_token=' . csrf_token()}}",

                }

            } )
            .then( editor => {
                window.editor = editor;




            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: qiybqic1scos-2mtgwv7b85hg' );
                console.error( error );
            } );
    </script>

    <script>ClassicEditor
            .create( document.querySelector( '#description_en' ), {

                licenseKey: '',
                language: 'en',

                ckfinder: {
                    uploadUrl: "{{route('projects.uploadImage') . '?_token=' . csrf_token()}}"
                }

            } )
            .then( editor => {
                window.editor = editor;




            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: qiybqic1scos-2mtgwv7b85hg' );
                console.error( error );
            } );
    </script>


    <script>ClassicEditor
            .create( document.querySelector( '#description_fr' ), {

                licenseKey: '',
                language: 'fr',
                ui: 'en',

                ckfinder: {
                    uploadUrl: "{{route('projects.uploadImage') . '?_token=' . csrf_token()}}"
                }

            } )
            .then( editor => {
                window.editor = editor;




            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: qiybqic1scos-2mtgwv7b85hg' );
                console.error( error );
            } );
    </script>
@endsection
