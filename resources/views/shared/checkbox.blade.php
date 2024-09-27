@php
    $class ??= "";
    $type ??= "checkbox";
    $value ??= "";
    $name ??= "";
    $label ??= ucfirst($name);
@endphp


<div class="form-group">
    <div class="form-check form-switch">
        <input type="hidden" value="0" name="{{$name}}">
        <input class="form-check-input {{--@error($name)is-invalid@enderror--}}" type="{{$type}}" id="{{$name}}" role="switch" @checked(old($name, $value ?? false)) value="1">
        <label class="form-check-label" for="{{$name}}">{{$label}}</label>
        {{--    @error($name)--}}
        {{--        <div class="invalid-feedback"> {{$message}} </div>--}}
        {{--    @enderror--}}
    </div>
</div>
