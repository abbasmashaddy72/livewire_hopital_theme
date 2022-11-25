<x-guest-layout>
    @slot('left')
        <img alt="Larvel Tailwind HTML Admin Template" class="w-1/2 -mt-16 -intro-x"
            src="{{ asset('dist/images/illustration.svg') }}">
        <div class="w-4/6 mt-10 text-4xl font-medium leading-tight text-white -intro-x">
            {{ __('A few more clicks to sign in to your account.') }}</div>
        <div class="mt-5 text-lg text-white -intro-x text-opacity-70 dark:text-slate-400">
            {{ __('Manage your Hospitals/Clinics in one place') }}</div>
    @endslot
    @slot('right')
        <h2 class="text-2xl font-bold text-center intro-x xl:text-3xl xl:text-left">{{ __('Sign In') }}</h2>

        <div class="mt-2 text-center intro-x text-slate-400 xl:hidden">
            {{ __('A few more clicks to sign in to your account.') }}{{ __('Manage your Hospitals/Clinics in one place') }}
        </div>

        <div class="mt-8 intro-x">

            <!-- Session Status -->
            <x-auth.session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth.validation-errors class="mb-4" :errors="$errors" />

            <x-form action="{{ route('login') }}">

                <x-label>{{ __('Email') }}
                    <x-input name="email" label="{{ __('Email') }}" type="email" required autofocus class="mt-2" />
                </x-label>

                <x-label>{{ __('Password') }}
                    <x-input name="password" label="{{ __('Password') }}" type="password" required
                        autocomplete="current-password" class="mt-2" />
                </x-label>

                <div class="flex mt-4 text-xs intro-x text-slate-600 dark:text-slate-500 sm:text-sm">

                    <div class="flex items-center mr-auto">
                        <x-checkbox name="remember" type="checkbox" label="{{ __('Remember me') }}" />
                    </div>

                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                </div>

                <div class="mt-5 text-center intro-x xl:mt-8 xl:text-left">

                    <button class="w-full px-2 py-2 mr-auto align-top btn btn-primary xl:w-32 xl:mr-3" id="btn-login"
                        type="submit">{{ __('Sign In') }}</button>

                    <a class="w-full px-2 py-2 mt-3 align-top btn btn-outline-secondary xl:w-32 xl:mt-0"
                        href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>

            </x-form>
        </div>
    @endslot
</x-guest-layout>
