@props([
    'keyword' => '',
    'location' => '',
    'category' => '',
    'categories' => [],
])

<div class="w-full max-w-5xl mx-auto my-12">
    <div
        class="bg-white rounded-3xl shadow-lg shadow-gray-200/50 p-4 md:px-6 flex flex-col gap-6 md:flex-row md:items-center">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 flex-1">

            <div
                class="flex items-center gap-3 px-4 py-2 bg-white rounded-xl border border-gray-100 md:border-none md:p-0">
                <x-heroicon-o-magnifying-glass class="w-5 h-5 text-gray-400 shrink-0" />

                <input type="text" name="keyword" value="{{ old('keyword', request()->query('keyword')) }}"
                    placeholder="Job title or keyword"
                    class="w-full bg-transparent text-green-900 placeholder-gray-400 focus:outline-none text-base" />
            </div>

            <div
                class="flex items-center gap-3 px-4 py-2 bg-white rounded-xl border border-gray-100 md:border-none md:p-0
                md:border-l">
                <x-heroicon-o-map-pin class="w-5 h-5 text-gray-400 shrink-0" />

                <input type="text" name="location" value="{{ old('location', request()->query('location')) }}"
                    placeholder="Location"
                    class="w-full bg-transparent text-green-900 placeholder-gray-400 focus:outline-none text-base" />
            </div>

            <div
                class="flex items-center gap-3 px-4 py-2 bg-white rounded-xl border border-gray-100 md:border-none md:p-0
                md:border-l">
                <x-heroicon-o-briefcase class="w-5 h-5 text-gray-400 shrink-0" />

                <select name="category"
                    class="w-full bg-transparent text-green-900 focus:outline-none text-base cursor-pointer">
                    <option value="">All categories</option>

                    @foreach ($categories as $cat)
                        <option value="{{ $cat }}" @selected(old('category', request('category')) === $cat)>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <x-button type="submit">
            Search
        </x-button>
    </div>
</div>
