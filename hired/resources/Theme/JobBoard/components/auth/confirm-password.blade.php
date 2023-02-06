<x-jobboard::layout.app>
    <!-- Session Status -->
    <x-jobboard::auth-session-status class="mb-4" :status="session('status')"/>

    <x-jobboard::form-modal>
        <x-slot:title>
            <h1 class="fw-bold mb-0 fs-2">{{__('This is a secure area of the application. Please confirm your password before continuing.')}}</h1>
        </x-slot:title>
    </x-jobboard::form-modal>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <x-jobboard::form-password :autocomplete="'current-password'"/>

        <!-- Confirm Button -->
        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">{{__('Confirm')}}</button>

    </form>
</x-jobboard::layout.app>>
