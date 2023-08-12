@extends('admin.layouts.app')
@section('title',__('forms.add-project'))



@section('content')


    <div class="card">
        <div class="card-body">

                <form action="{{route('projects.store')}}" method="POST" enctype="multipart/form-data" class="mt-3">


                        @csrf

                    <span class="fi fi-sa  mx-auto d-block" style="width: 70px; height: 70Px"></span>


                    <x-admin.forms.input name="title" title="{{__('forms.title')}}" type="text" value="{{old('title')}}"/>

                        <div class="form-group">
                            <label for="category" class="form-label">{{__('home.categories')}}</label>
                            <select name="category" id="category" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>


                        <x-admin.forms.input name="thumbnail" title="{{__('forms.picture')}}" type="file" value="{{old('thumbnail')}}"/>
                        <x-admin.forms.text-area name="description" id="#content" class="content" title="article-content-ar"  value="{!!old('description')!!}"/>
                         <hr>
                        <span class="fi fi-gb  mx-auto d-block" style="width: 70px; height: 70Px"></span>

                    <x-admin.forms.input name="title_en" title="{{__('forms.title-in-en')}}" type="text" value="{{old('title_en')}}"/>
                    <x-admin.forms.text-area name="description_en" id="content_1" title="article-content-en"  value="{!!old('description_en')!!}"/>
                        <hr>

                    <span class="fi fi-fr mx-auto d-block" style="width: 70px; height: 70Px"></span>

                    <x-admin.forms.input name="title_fr" title="{{__('forms.title-in-fr')}}" type="text" value="{{old('title_fr')}}"/>
                    <x-admin.forms.text-area name="description_fr" id="content_2" title="article-content-fr"  value="{!!old('description_fr')!!}"/>

                    <x-admin.forms.input name="price" title="{{__('forms.price')}}" type="number" value="{{old('price')}}"/>



                    <div class="mb-3">
                        <label for="created_at">{{__('أنشا')}}</label>
                        <input type="datetime-local" class="form-control" name="created_at" value="{{date('Y-m-d H:i')}}">
                    </div>

                        <div class="mb-3">
                            <label for="status">{{__('الحالة')}}</label>
                            <select name="status" id="status" class="form-control">
                                <option value="open">مفتوح</option>
                                <option value="hidden">مختفي</option>
                                <option value="completed">مكتمل</option>
                            </select>
                        </div>

                    <button type="submit" class="btn btn-primary w-100">{{__('forms.add-articles')}}</button>
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
