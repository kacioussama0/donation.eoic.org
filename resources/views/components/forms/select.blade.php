<div class="uk-margin-bottom col-md">

    <label for="{{$name}}" class="uk-label uk-label-warning @error($name) uk-label-danger @enderror">{{$title}}</label>
    <select name="{{$name}}" id="{{$name}}" class="uk-input @error($name) uk-form-danger @enderror">
        @foreach($choices as $choice)

            <option value="{{$choice}}">{{$choice}}</option>

        @endforeach

    </select>
    @error($name)
    <span class="uk-text-danger">{{__($message)}}</span>
    @enderror
</div>
