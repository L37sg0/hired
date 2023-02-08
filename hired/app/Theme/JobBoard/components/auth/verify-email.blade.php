<x-jobboard::layout.app>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <x-jobboard::form-modal>

        <x-slot:title>
            <h1 class="fw-bold mb-0 fs-2">{{__('Please verify your email')}}</h1>
        </x-slot:title>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary"
                    type="submit">{{__('Resend Verification Email')}}</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-secondary" type="submit">{{__('Log Out')}}</button>
        </form>
    </x-jobboard::form-modal>
</x-jobboard::layout.app>
