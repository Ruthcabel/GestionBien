@php
    $class ??= "";
    $value ??= "";
    $name ??= "";
    $label ??= ucfirst($name);
    $multiple ??= false;
@endphp


<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <select id="{{$name}}" name="{{$name}}[]" class="form-control {{--@error($name)is-invalid@enderror--}}" multiple=$multiple>
        @foreach($options as $k => $v)
            <option @selected($value->contains($k)) value="{{$k}}">{{$v}}</option>
        @endforeach
    </select>
    {{--    @error($name)--}}
    {{--        <div class="invalid-feedback"> {{$message}} </div>--}}
    {{--    @enderror--}}
</div>
