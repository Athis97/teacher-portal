<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <div class="flex">
                <span
                    class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                    <svg fill="none" viewBox="0 0 24 24" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                        <g stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                            <path
                                d="m12.199 12c2.7614 0 5-2.2386 5-5s-2.2386-5-5-5c-2.7614 0-5 2.2386-5 5s2.2386 5 5 5z" />
                            <path
                                d="m3 22c0.57038-1.9668 1.748-3.7029 3.3644-4.9601 1.6164-1.2572 3.589-1.9712 5.6356-2.0399 4.12 0 7.63 2.91 9 7" />
                        </g>
                    </svg>

                </span>
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="flex">
                <span
                    class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                    <svg fill="none" viewBox="0 0 15 15" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m4.5 6.5v-3c0-1.6568 1.3432-3 3-3s3 1.3432 3 3v0.5m-8 2.5h10c0.5523 0 1 0.44772 1 1v6c0 0.5523-0.4477 1-1 1h-10c-0.55228 0-1-0.4477-1-1v-6c0-0.55228 0.44772-1 1-1z"
                            stroke="#000" />
                    </svg>
                </span>
                <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 block">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mb-12 flex items-center justify-end">
            @if (Route::has('password.request'))
                <a class="rounded-md text-sm text-blue-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-center">
            <x-primary-button class="ms-3">
                {{ __('Login') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>