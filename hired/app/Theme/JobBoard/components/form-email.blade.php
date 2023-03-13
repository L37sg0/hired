@props([
    'value' => old('email')
])

<!-- Email Address -->
<div class="form-floating mb-3">
    <x-jobboard::input-label for="email" :value="__('Email')"/>
    <x-jobboard::text-input id="email" class="form-control rounded-3" type="email" name="email"
                            :value="$value" required autofocus/>
    <x-jobboard::input-error :messages="$errors->get('email')" class="mt-2"/>
</div>
