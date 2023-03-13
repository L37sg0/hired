<x-jobboard::layout.app>
    <!-- Session Status -->
    <x-jobboard::auth-session-status class="mb-4" :status="session('status')" />

    <!-- Login Form -->
    <x-jobboard::components.form-modal>
        <x-slot:title>
            <h1 class="fw-bold mb-0 fs-2">{{__('Login')}}</h1>
        </x-slot:title>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <x-jobboard::components.form-email/>
            <!-- Password -->
            <x-jobboard::components.form-password :autocomplete="'current-password'"/>

            <!-- Log In Button -->
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">{{__('Log in')}}</button>

            <!-- Remember Me -->
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" value="remember-me"> {{__('Remember me')}}
                </label>
            </div>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <!-- Social Logins -->
            <hr class="my-4">
            <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                <svg class="bi me-1" width="16" height="16">
                    <use xlink:href="#facebook"></use>
                </svg>
                {{__('Log in with Facebook')}}
            </button>
            <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                <svg class="bi me-1" width="16" height="16">
                    <use xlink:href="#github"></use>
                </svg>
                {{__('Log in with Github')}}
            </button>
        </form>
    </x-jobboard::components.form-modal>
</x-jobboard::layout.app>
