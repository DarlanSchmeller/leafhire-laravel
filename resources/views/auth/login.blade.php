<x-layout>
    <div class="w-full max-w-md mx-auto my-24">
        <div class="bg-white rounded-3xl p-6 md:p-8">

            <div class="flex justify-center mb-10">
                <a href="{{ route('jobs.index') }}"><img src="{{ asset('images/leafhire.webp') }}" alt="Company Logo"
                        class="h-20 object-cover" /></a>
            </div>

            <form method="POST" action="{{ route('jobs.index') }}" class="flex flex-col gap-6">
                @csrf

                <div class="flex items-center gap-3 px-4 py-3 bg-white rounded-xl border border-gray-200">
                    <x-heroicon-o-envelope class="w-5 h-5 text-gray-400 shrink-0" />

                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email address"
                        required autofocus
                        class="w-full bg-transparent text-green-900 placeholder-gray-400 focus:outline-none text-base" />
                </div>

                <div class="flex items-center gap-3 px-4 py-3 bg-white rounded-xl border border-gray-200">
                    <x-heroicon-o-lock-closed class="w-5 h-5 text-gray-400 shrink-0" />

                    <input type="password" name="password" placeholder="Password" required
                        class="w-full bg-transparent text-green-900 placeholder-gray-400 focus:outline-none text-base" />
                </div>

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
                Don’t have an account?
                <a href="{{ route('jobs.index') }}" class="text-green-700 font-semibold hover:underline">
                    Create one
                </a>
            </p>

        </div>
    </div>
</x-layout>
