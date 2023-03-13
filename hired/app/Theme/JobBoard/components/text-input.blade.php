{{--@props(['disabled' => false])--}}

{{--<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => '']) !!}>--}}
@props([
    'label' => '',
    'name' => '',
    'placeholder' => '',
    'value' => ''
])
<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input type="text"
           class="form-control rounded-3"
           id="{{$name}}"
           name="{{$name}}"
           placeholder="{{$placeholder}}"
           value="{{$value}}">
</div>
