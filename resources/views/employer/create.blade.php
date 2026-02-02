<x-layout>
    <div class="w-full max-w-md mx-auto my-24">
        <div class="rounded-3xl p-6 md:p-8">

            <h1 class="text-2xl font-semibold text-green-900 mb-6">
                Create a New Job Listing
            </h1>

            <form method="POST" action="{{ route('employer.store') }}" class="flex flex-col gap-6">
                @csrf

                <x-input name="company_name" type="company_name" placeholder="Company name" required autofocus>
                    <x-slot:icon>
                        <x-heroicon-o-building-office-2 class="w-5 h-5 text-gray-400 shrink-0" />
                    </x-slot:icon>
                </x-input>

                <x-button type="submit" class="mt-4">
                    Register as an Employer
                </x-button>
            </form>

        </div>
    </div>
</x-layout>
