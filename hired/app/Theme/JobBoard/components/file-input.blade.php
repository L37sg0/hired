@props([
    'label' => '',
    'name' => '',
])
<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input type="file"
           class="form-control rounded-3"
           id="{{$name}}"
           name="{{$name}}">
</div>
