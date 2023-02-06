<x-guest-layout>
    <x-jobboard::form-modal>
        <x-slot:title>
            <h1 class="fw-bold mb-0 fs-2">{{__('Register')}}</h1>
        </x-slot:title>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-jobboard::form-name></x-jobboard::form-name>

            <x-jobboard::form-email></x-jobboard::form-email>

            <!-- Password -->
            <x-jobboard::form-password  :autocomplete="'new-password'"/>

            <!-- Confirm Password -->
            <x-jobboard::form-password :label="__('Confirm Password')" :name="'password_confirmation'"/>

            <!-- Register Button -->
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">{{__('Register')}}</button>

            <!-- Confirm Registration Policies -->
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="confirm_policies" value="confirm_policies"> {{__('Confirm Registration Policies')}}
                </label>
            </div>

            <!-- Already Registered -->
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <!-- Social Registration -->
            <hr class="my-4">
            <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                <svg class="bi me-1" width="16" height="16">
                    <use xlink:href="#facebook"></use>
                </svg>
                {{__('Register with Facebook')}}
            </button>
            <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                <svg class="bi me-1" width="16" height="16">
                    <use xlink:href="#github"></use>
                </svg>
                {{__('Register with Github')}}
            </button>
        </form>
    </x-jobboard::form-modal>
</x-guest-layout>
