@props(['route', 'icon' => 'arrow-left', 'text' => 'Back to jobs', 'background' => null])

<a href="{{ $route ?? route('jobs.index') }}"
    class="inline-flex items-center gap-2 text-gray-600 hover:text-green-900 font-medium transition-colors mb-8 {{ $background ? 'border-lime-300 p-4' : '' }}">
    <x-dynamic-component :component="'heroicon-o-' . $icon" class="w-5 h-5" />
    {{ $text }}
</a>
