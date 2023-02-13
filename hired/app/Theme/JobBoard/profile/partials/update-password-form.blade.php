<form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

    <x-jobboard::form-password :autocomplete="'current-password'" :label="__('Current Password')" :name="'current_password'"/>
{{--        <div>--}}
{{--            <x-input-label for="current_password" :value="__('Current Password')" />--}}
{{--            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />--}}
{{--            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />--}}
{{--        </div>--}}

    <x-jobboard::form-password :autocomplete="'password'" :label="__('New Password')"
                               :name="'new-password'"/>
{{--        <div>--}}
{{--            <x-input-label for="password" :value="__('New Password')" />--}}
{{--            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />--}}
{{--            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />--}}
{{--        </div>--}}

    <x-jobboard::form-password :autocomplete="'new-password'" :label="__('Confirm Password')"
                               :name="'password_confirmation'"/>
{{--        <div>--}}
{{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}
{{--            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />--}}
{{--            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />--}}
{{--        </div>--}}

    <!-- Save Button -->
    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">{{__('Save')}}</button>

    <div>
        @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-success"
            >{{ __('Saved.') }}</p>
        @endif
    </div>
    </form>
