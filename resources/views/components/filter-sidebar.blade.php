@if ($isMobileOpen)
    <div class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        onclick="document.dispatchEvent(new CustomEvent('close-filters'))"></div>
@endif

<aside
    class="
        {{ $isMobileOpen ? 'fixed top-4 right-4 bottom-4 w-80 z-50 lg:hidden' : 'hidden lg:block w-72 shrink-0' }}
    ">
    <div
        class="
                bg-white
                rounded-3xl
                flex
                flex-col
                pb-4
            ">
        <div class="flex items-center justify-between px-6 py-5">
            <h3 class="text-lg font-semibold text-gray-900">Filters</h3>
            <div class="flex items-center gap-2">
                @if ($hasActiveFilters())
                    <a href="{{ request()->url() }}"
                        class="text-sm text-blue-600 hover:text-blue-700 font-medium transition-colors">
                        Clear all
                    </a>
                @endif
                @if ($isMobileOpen)
                    <button onclick="document.dispatchEvent(new CustomEvent('close-filters'))"
                        class="p-1 hover:bg-gray-100 rounded-lg transition">
                        <x-heroicon-o-x-mark class="w-5 h-5" />
                    </button>
                @endif
            </div>
        </div>
        <div class="flex-1 overflow-y-auto px-6 py-6 space-y-8">
            <div>
                <h4 class="text-sm font-semibold text-gray-900 mb-4">Experience Level</h4>
                <div class="space-y-2">
                    @foreach ($experienceLevels as $level)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="experience" value="{{ $level }}"
                                @checked($selectedExperience === $level) class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                            <span class="text-gray-700 group-hover:text-gray-900 transition">
                                {{ ucfirst($level) }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-gray-900 mb-4">Salary Range</h4>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-2">Minimum</label>
                        <input type="number" name="min_salary" value="{{ $minSalary }}" placeholder="$0"
                            class="w-full px-4 py-2.5 rounded-2xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-2">Maximum</label>
                        <input type="number" name="max_salary" value="{{ $maxSalary }}" placeholder="$500,000"
                            class="w-full px-4 py-2.5 rounded-2xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
