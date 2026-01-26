@props([
    'route' => null,
    'padding' => 'px-8 py-4',
    'rounded' => 'rounded-2xl',
    'type' => 'button',
    'fullWidth' => false,
])

@if (!empty($route))
    <a href="{{ $route }}"
        {{ $attributes->class([
            'block bg-lime-600 hover:bg-lime-600 text-white font-bold transition-colors duration-200 cursor-pointer text-center',
            $rounded,
            $padding,
            'w-full' => $fullWidth,
        ]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}"
        {{ $attributes->class([
            'block bg-lime-600 hover:bg-lime-600 text-white font-bold transition-colors duration-200 cursor-pointer text-center',
            $rounded,
            $padding,
            'w-full' => $fullWidth,
        ]) }}>
        {{ $slot }}
    </button>
@endif
