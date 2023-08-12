<div>
    @if(count($objects))
        <div class="table-responsive mt-3">

            <table class="table table-primary table-striped align-middle">

                <thead>
                <tr>
                    @foreach($thead as $th)
                        <th>{{$th}}</th>
                    @endforeach
                    <th>{{__('الإجراءات')}}</th>
                </tr>
                </thead>

                <tbody>

                @foreach($objects as $object)

                    <tr>

                        @foreach($tbody as $content)

                            <td>{{ $object->$content}}</td>


                        @endforeach

                        <td>
                            <div class="btn-group position-relative z-20">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{__('الإجراءات')}}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">{{__('تعديل')}}</a></li>
                                    <li>
                                        <form action="{{route($deletePath,$object)}}" method = "POST" onsubmit="return confirm('هل أنت متأكد')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn">{{__('حذف')}}</button>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </td>
                    </tr>

                @endforeach

                </tbody>

            </table>

            <div class="d-flex justify-content-center">{{$objects -> links()}}</div>

        </div>
    @else
        <div class="alert alert-danger my-5">
            <h1 class="display-1 text-center">{{__('فارغ')}}</h1>
        </div>

    @endif
</div>
