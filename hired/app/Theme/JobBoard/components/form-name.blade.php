@props([
    'value' => old('name')
])

<!-- Name -->
<div class="form-floating mb-3">
    <x-jobboard::input-label for="name" :value="__('Name')"/>
    <x-jobboard::text-input id="name" class="form-control rounded-3" type="text" name="name" :value="$value"
                            required autofocus/>
    <x-jobboard::input-error :messages="$errors->get('name')" class="mt-2"/>
</div>
