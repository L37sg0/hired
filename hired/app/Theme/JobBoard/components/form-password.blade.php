@props([
    'label' => null,
    'name' => 'password',
    'autocomplete' => ''
])

<div class="form-floating mb-3">
    <x-jobboard::input-label for="{{$name}}" :value="$label ?? __('Password')"/>
    <x-jobboard::text-input id="{{$name}}" class="form-control rounded-3"
                            type="password"
                            name="{{$name}}"
                            required
                            autocomplete="{{$autocomplete}}"/>

    <x-jobboard::input-error :messages="$errors->get($name)" class="mt-2"/>
</div>
