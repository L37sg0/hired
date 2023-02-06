<x-jobboard::layout.app>
    <x-jobboard::form-modal>
        <x-slot:title>

        </x-slot:title>
    </x-jobboard::form-modal>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <x-jobboard::form-email/>

        <!-- Password -->
        <x-jobboard::form-password :autocomplete="'new-password'"/>

        <!-- Confirm Password -->
        <x-jobboard::form-password :label="__('Confirm Password')" :name="'password_confirmation'"/>

        <!-- Reset Password Button -->
        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">{{__('Reset Password')}}</button>
    </form>
</x-jobboard::layout.app>
