<x-layout>
    <div class="w-full max-w-xl mx-auto my-24">
        <div class="rounded-3xl p-6 md:p-8">

            <h1 class="text-2xl font-semibold text-green-900 mb-6">
                Create a New Job Listing
            </h1>

            <form method="POST" action="{{ route('jobs.index') }}" class="flex flex-col gap-6">
                @csrf

                <x-input name="title" placeholder="Job title" required autofocus>
                    <x-slot:icon>
                        <x-heroicon-o-briefcase class="w-5 h-5 text-gray-400 shrink-0" />
                    </x-slot:icon>
                </x-input>

                <div class="flex flex-col gap-1">
                    <textarea name="description" rows="5" placeholder="Job description" required
                        class="w-full rounded-xl border bg-white border-gray-300 px-4 py-3 text-sm
                               text-green-900 placeholder-gray-400
                               focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600
                               transition"></textarea>
                </div>

                <x-input name="salary" placeholder="Salary (optional)">
                    <x-slot:icon>
                        <x-heroicon-o-currency-dollar class="w-5 h-5 text-gray-400 shrink-0" />
                    </x-slot:icon>
                </x-input>

                <x-input name="location" placeholder="Location (Remote, City, Country)">
                    <x-slot:icon>
                        <x-heroicon-o-map-pin class="w-5 h-5 text-gray-400 shrink-0" />
                    </x-slot:icon>
                </x-input>

                <div class="flex flex-col gap-1">
                    <select name="category" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm bg-white
                               text-green-900
                               focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600
                               transition">
                        <option value="">Select category</option>
                        @foreach (\App\Models\JobListing::$category as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1">
                    <select name="experience" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm bg-white
                               text-green-900
                               focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600
                               transition">
                        <option value="">Experience level</option>
                        @foreach (\App\Models\JobListing::$experience as $level)
                            <option value="{{ $level }}">{{ ucfirst($level) }}</option>
                        @endforeach
                    </select>
                </div>

                <x-button type="submit" class="mt-4">
                    Create Job Listing
                </x-button>
            </form>

        </div>
    </div>
</x-layout>
