<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
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
                <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <div class="flex">
                <span
                    class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                    <svg fill="none" viewBox="0 0 24 24" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m16 12c0 2.2091-1.7909 4-4 4-2.2091 0-4-1.7909-4-4 0-2.2091 1.7909-4 4-4 2.2091 0 4 1.7909 4 4zm0 0v1.5c0 1.3807 1.1193 2.5 2.5 2.5v0c1.3807 0 2.5-1.1193 2.5-2.5v-1.5c0-4.9706-4.0294-9-9-9-4.9706 0-9 4.0294-9 9 0 4.9706 4.0294 9 9 9h4"
                            stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>

                </span>
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="flex">
                <span
                    class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                    <svg enable-background="new 0 0 52 52" width="20" height="20" fill="#000000" viewBox="0 0 52 52" xml:space="preserve"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m44.8 49.5h-37.6c-2.6 0-4.7-2.1-4.7-4.7v-37.6c0-2.6 2.1-4.7 4.7-4.7h37.6c2.6 0 4.7 2.1 4.7 4.7v37.6c0 2.5-2.1 4.7-4.7 4.7zm-35.9-39.2v31.3c0 0.9 0.7 1.6 1.6 1.6h31.2c0.9 0 1.6-0.7 1.6-1.6v-31.3c0-0.9-0.7-1.6-1.6-1.6h-31.3c-0.8 0.1-1.5 0.8-1.5 1.6z" />
                        <path
                            d="m38.8 23.8-0.9-3c-0.3-0.8-1.1-1.3-2-1l-6.8 2.2v-6.7c0-0.9-0.7-1.6-1.6-1.6h-3.1c-0.9 0-1.6 0.7-1.6 1.6v6.7l-6.6-2.2c-0.8-0.3-1.7 0.2-2 1l-0.9 3c-0.3 0.8 0.2 1.7 1 2l6.2 2-4.5 6.1c-0.5 0.7-0.3 1.7 0.4 2.2l2.6 1.8c0.7 0.5 1.7 0.3 2.2-0.4l4.9-6.8 4.9 6.8c0.5 0.7 1.5 0.9 2.2 0.4l2.6-1.8c0.7-0.5 0.9-1.5 0.4-2.2l-4.5-6.2 6.1-2c0.8-0.2 1.2-1 1-1.9z" />
                    </svg>
                </span>
                <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="flex">
                <span
                    class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                    <svg enable-background="new 0 0 52 52" width="20" height="20" fill="#000000" viewBox="0 0 52 52" xml:space="preserve"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m44.8 49.5h-37.6c-2.6 0-4.7-2.1-4.7-4.7v-37.6c0-2.6 2.1-4.7 4.7-4.7h37.6c2.6 0 4.7 2.1 4.7 4.7v37.6c0 2.5-2.1 4.7-4.7 4.7zm-35.9-39.2v31.3c0 0.9 0.7 1.6 1.6 1.6h31.2c0.9 0 1.6-0.7 1.6-1.6v-31.3c0-0.9-0.7-1.6-1.6-1.6h-31.3c-0.8 0.1-1.5 0.8-1.5 1.6z" />
                        <path
                            d="m38.8 23.8-0.9-3c-0.3-0.8-1.1-1.3-2-1l-6.8 2.2v-6.7c0-0.9-0.7-1.6-1.6-1.6h-3.1c-0.9 0-1.6 0.7-1.6 1.6v6.7l-6.6-2.2c-0.8-0.3-1.7 0.2-2 1l-0.9 3c-0.3 0.8 0.2 1.7 1 2l6.2 2-4.5 6.1c-0.5 0.7-0.3 1.7 0.4 2.2l2.6 1.8c0.7 0.5 1.7 0.3 2.2-0.4l4.9-6.8 4.9 6.8c0.5 0.7 1.5 0.9 2.2 0.4l2.6-1.8c0.7-0.5 0.9-1.5 0.4-2.2l-4.5-6.2 6.1-2c0.8-0.2 1.2-1 1-1.9z" />
                    </svg>
                </span>
                <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>