<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <div class="flex">
                <span class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                    <svg fill="none" viewBox="0 0 24 24" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="m16 12c0 2.2091-1.7909 4-4 4-2.2091 0-4-1.7909-4-4 0-2.2091 1.7909-4 4-4 2.2091 0 4 1.7909 4 4zm0 0v1.5c0 1.3807 1.1193 2.5 2.5 2.5v0c1.3807 0 2.5-1.1193 2.5-2.5v-1.5c0-4.9706-4.0294-9-9-9-4.9706 0-9 4.0294-9 9 0 4.9706 4.0294 9 9 9h4" stroke="#000"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>

                </span>
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
