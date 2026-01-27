<x-layout>
    <div class="w-full max-w-md mx-auto my-24">
        <div class="bg-white rounded-3xl p-6 md:p-8 shadow-lg shadow-gray-200/50">

            <div class="flex justify-center mb-10">
                <a href="{{ route('jobs.index') }}">
                    <img src="{{ asset('images/leafhire.webp') }}" alt="Company Logo" class="h-20 object-contain" />
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-lime-200 bg-lime-50 px-5 py-4 flex items-start gap-3">
                    <x-heroicon-o-check-circle class="w-6 h-6 text-lime-600 mt-0.5" />
                    <div>
                        <p class="font-semibold text-lime-900">
                            Success
                        </p>
                        <p class="text-sm text-lime-700">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 flex items-start gap-3">
                    <x-heroicon-o-exclamation-circle class="w-6 h-6 text-red-600 mt-0.5" />
                    <div>
                        <p class="font-semibold text-red-900 mb-1">
                            Something went wrong: {{ $error }}
                        </p>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login.auth') }}" class="flex flex-col gap-6">
                @csrf

                <x-input name="email" type="email" placeholder="Email address" required autofocus>
                    <x-slot:icon>
                        <x-heroicon-o-envelope class="w-5 h-5 text-gray-400 shrink-0" />
                    </x-slot:icon>
                </x-input>

                <x-input name="password" type="password" placeholder="Password" required>
                    <x-slot:icon>
                        <x-heroicon-o-lock-closed class="w-5 h-5 text-gray-400 shrink-0" />
                    </x-slot:icon>
                </x-input>

                <div class="flex items-center justify-between text-sm text-gray-600 px-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember"
                            class="rounded border-gray-300 text-green-700 focus:ring-green-700" />
                        Remember me
                    </label>

                    <a href="{{ route('jobs.index') }}" class="text-green-700 font-medium hover:underline">
                        Forgot password?
                    </a>
                </div>

                <x-button type="submit" class="mt-4">
                    Sign in
                </x-button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-8">
                Don't have an account?
                <a href="{{ route('jobs.index') }}" class="text-green-700 font-semibold hover:underline">
                    Create one
                </a>
            </p>

        </div>
    </div>
</x-layout>
