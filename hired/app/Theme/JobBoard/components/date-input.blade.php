@props([
    'label' => '',
    'name' => '',
    'placeholder' => '',
    'value' => ''
])

<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input type="date"
           class="form-control rounded-3"
           id="{{$name}}"
           name="{{$name}}"
           placeholder="{{$placeholder}}"
           value="{{$value}}">
</div>
