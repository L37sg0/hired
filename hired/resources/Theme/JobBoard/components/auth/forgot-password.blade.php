<x-jobboard::layout.app>

    <!-- Session Status -->
    <x-jobboard::auth-session-status class="mb-4" :status="session('status')"/>
    <x-jobboard::form-modal>
        <x-slot:title>
            <h1 class="fw-bold mb-0 fs-2">{{__('Email for password reset link.')}}</h1>
        </x-slot:title>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <x-jobboard::form-email/>

            <!-- Send Link Button -->
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">{{__('Send Link')}}</button>
        </form>
    </x-jobboard::form-modal>

</x-jobboard::layout.app>
