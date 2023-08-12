<div class="form-group mb-1 ">

    <label for="{{$name}}" class="form-label @error($name) uk-label-danger @enderror">{{$title}}</label>
    <input type="{{$type}}" name="{{$name}}" id="{{$name}}" placeholder="" class="form-control @error($name) is-invalid @enderror" value="{{old($name)}}">

    @error($name)
    <span class="text-danger">{{__($message)}}</span>
    @enderror

</div>
