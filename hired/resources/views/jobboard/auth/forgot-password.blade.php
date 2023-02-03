<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="modal-dialog position-static d-block " role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">{{__('Email for password reset link.')}}</h1>
            </div>

            <div class="modal-body p-5 pt-0">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-floating mb-3">
                        <x-input-label for="email" :value="__('Email')"/>
                        <x-text-input id="email" class="form-control rounded-3" type="email" name="email"
                                      :value="old('email')" required autofocus/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>

{{--                <form method="POST" action="{{ route('login') }}">--}}
{{--                    @csrf--}}
{{--                    <!-- Email Address -->--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <x-input-label for="email" :value="__('Email')"/>--}}
{{--                        <x-text-input id="email" class="form-control rounded-3" type="email" name="email"--}}
{{--                                      :value="old('email')" required autofocus/>--}}
{{--                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>--}}
{{--                    </div>--}}

{{--                    <!-- Password -->--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <x-input-label for="password" :value="__('Password')"/>--}}
{{--                        <x-text-input id="password" class="form-control rounded-3"--}}
{{--                                      type="password"--}}
{{--                                      name="password"--}}
{{--                                      required autocomplete="current-password"/>--}}
{{--                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>--}}
{{--                    </div>--}}

{{--                    <!-- Remember Me -->--}}
{{--                    <div class="checkbox mb-3">--}}
{{--                        <label>--}}
{{--                            <input type="checkbox" name="remember" value="remember-me"> {{__('Remember me')}}--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                    <!-- Forgot Password -->--}}
{{--                    @if (Route::has('password.request'))--}}
{{--                        <a href="{{ route('password.request') }}">--}}
{{--                            {{ __('Forgot your password?') }}--}}
{{--                        </a>--}}
{{--                    @endif--}}

{{--                    <!-- Log In Button -->--}}
{{--                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">{{__('Log in')}}</button>--}}

{{--                    <!-- Social Logins -->--}}
{{--                    <hr class="my-4">--}}
{{--                    <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">--}}
{{--                        <svg class="bi me-1" width="16" height="16">--}}
{{--                            <use xlink:href="#facebook"></use>--}}
{{--                        </svg>--}}
{{--                        {{__('Log in with Facebook')}}--}}
{{--                    </button>--}}
{{--                    <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">--}}
{{--                        <svg class="bi me-1" width="16" height="16">--}}
{{--                            <use xlink:href="#github"></use>--}}
{{--                        </svg>--}}
{{--                        {{__('Log in with Github')}}--}}
{{--                    </button>--}}
{{--                </form>--}}
            </div>
        </div>
    </div>

</x-guest-layout>
