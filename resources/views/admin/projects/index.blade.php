@extends('admin.layouts.app')

@section('title',__('forms.projects'))



@section('content')

    <span class="d-flex justify-content-between flex-sm-row flex-column">

            <a href="{{route('projects.create')}}" class="btn btn-lg btn-primary mb-4">{{__('forms.add-project')}}</a>

    </span>

    @include('admin.layouts.success')


    <form action="{{route('projects.create')}}" method="GET">

        <div class="input-group mb-3">
            <input type="search" class="form-control" name="title" value="{{old('title')}}">
            <button type="submit" class="btn btn-primary">{{__('home.search')}}</button>
        </div>

    </form>

    <div class="card">
                        <div class="table-responsive rounded align-middle text-center">


                            <table class="table table-striped table-waning border rounded align-middle">

                                <thead>

                                <tr>
                                    <th>{{__('forms.title')}}</th>
                                    <th>{{__('forms.category')}}</th>
                                    <th>
                                        <i class="fi fi-gb"></i>
                                    </th>

                                    <th>
                                        <i class="fi fi-fr"></i>
                                    </th>

                                    <th>{{__('forms.picture')}}</th>
                                    <th>{{__('forms.created-at')}}</th>
                                    <th>{{__('forms.edited-at')}}</th>
                                    <th>{{__('forms.procedures')}}</th>
                                </tr>

                                </thead>

                                <tbody>

                                @foreach($projects as $project)

                                    <tr>

                                        <td>{{$project->title}}</td>

                                        <td>
                                            <span class="badge bg-secondary p-2" style="font-size: 16px">{{$project->category->name}}</span>
                                        </td>

                                        <td>
                                            {{$project->title_en ? __('forms.yes') : __('forms.no')}}

                                        </td>

                                        <td>
                                            {{$project->title_fr ? __('forms.yes') : __('forms.no')}}


                                        </td>

                                        <td>
                                            <img src="{{File::exists('storage/' . $project->thumbnail) ? asset('storage/' . $project->thumbnail) : asset('imgs/logo.svg') }}" alt="" style="width: 80px ; height: 80px ; object-fit: cover ; border-radius: 5Px">
                                        </td>


                                        <td>{{$project->created_at}}</td>
                                        <td>{{$project->updated_at}}</td>
                                        <td>





                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{__('forms.procedures')}}
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{route('projects.show',$project)}}" class="dropdown-item">{{__('forms.show-case')}}</a></li>
                                                    <li> <a href="{{route('projects.edit',$project)}}"  class="dropdown-item">{{__('forms.edit')}}</a></li>

                                                    <li>
                                                        <form action="{{route('projects.destroy',$project)}}" method="POST" onsubmit="return confirm('{{__('forms.you-sure')}}')" class="d-inline-block w-100">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item">{{__('forms.delete')}}</button>

                                                        </form>
                                                    </li>
                                                </ul>

                                            </div>


                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>

                            </table>

                            <div class="d-flex justify-content-center">{{$projects -> links()}}</div>
                        </div>







@endsection


