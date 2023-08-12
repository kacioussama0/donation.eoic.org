<div class="form-group">
    <label for="{{$name}}" class="form-label">{{$title}}</label>
    <textarea name="{{$name}}" id="{{$name}}"  class="form-control">
                {{$value}}
    </textarea>
    @error($name)
    <span class="text-danger">{{__($message)}}</span>
    @enderror
</div>
