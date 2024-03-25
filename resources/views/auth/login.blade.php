<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex justify-center">
        <div id="logo" class="w-52 animate-bounce">
            <x-application-logo class="block h-9 fill-current" />
        </div>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>           
            <label class="input input-bordered flex items-center gap-2" for="email" :value="__('Email')" >
                <x-heroicon-c-envelope class="w-4 h-4 opacity-70" />
                <x-text-input id="email"  type="text" class="grow border-none focus:outline-none" placeholder="{{__('Email')}}" />
            </label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label class="input input-bordered flex items-center gap-2" for="password" :value="__('Password')" >
                <x-heroicon-s-key class="w-4 h-4 opacity-70" />
                <x-text-input id="password" class="grow border-none focus:outline-none" placeholder="{{__('Password')}}" 
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            </label>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const bouncingDiv = document.getElementById('logo');

        emailInput.addEventListener('focus', () => {
            bouncingDiv.classList.add('animate-bounce');
        });

        emailInput.addEventListener('blur', () => {
            bouncingDiv.classList.remove('animate-bounce');
        });

        passwordInput.addEventListener('focus', () => {
            bouncingDiv.classList.add('blur-md');
        });

        passwordInput.addEventListener('blur', () => {
            bouncingDiv.classList.remove('blur-md');
        });
    </script>
</x-guest-layout>
