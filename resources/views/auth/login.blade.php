<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8 border border-gray-200">

```
        <!-- Header -->
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Login</h2>
            <p class="text-sm text-gray-500 mt-1">Access your account</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-green-600 text-sm" :status="session('status')" />

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" value="Email" class="text-gray-700 font-medium"/>
                <x-text-input 
                    id="email"
                    class="block w-full mt-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required autofocus
                />
                <x-input-error :messages="$errors->get('email')" class="mt-1"/>
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" value="Password" class="text-gray-700 font-medium"/>
                <x-text-input 
                    id="password"
                    class="block w-full mt-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    type="password"
                    name="password"
                    required
                />
                <x-input-error :messages="$errors->get('password')" class="mt-1"/>
            </div>

            <!-- Options -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600">
                    Remember me
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" 
                       class="text-indigo-600 hover:underline">
                        Forgot?
                    </a>
                @endif
            </div>

            <!-- Login Button -->
            <x-primary-button class="w-full justify-center py-2.5 text-base rounded-lg">
                Log in
            </x-primary-button>

            <!-- Register -->
            @if (Route::has('register'))
                <p class="text-center text-sm text-gray-600">
                    Don’t have an account?
                    <a href="{{ route('register') }}" 
                       class="text-indigo-600 font-semibold hover:underline">
                        Sign up
                    </a>
                </p>
            @endif
        </form>

    </div>
</div>
```

</x-guest-layout>
