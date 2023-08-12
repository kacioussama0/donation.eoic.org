<div class="form-group  mb-3">
    <label for="{{$name}}" class="form-label" >{{$title}}</label>
    <input type="{{$type}}" name="{{$name}}" id="{{$name}}" class="form-control @error($name) is-invalid @enderror" placeholder="" value="{{$value}}">
    @error($name)
    <span class="text-danger">{{__($message)}}</span>
    @enderror
</div>
