@props([
    'route',
    'icon' => 'arrow-left',
    'text' => 'Back to jobs',
    'background' => null,
])

<a href="{{ route('jobs.index') }}"
    class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-medium transition-colors mb-8 {{ $background ? 'border-blue-300 p-4' : '' }}">
        <x-dynamic-component :component="'heroicon-o-' . $icon" class="w-5 h-5" />
        {{ $text }}
</a>