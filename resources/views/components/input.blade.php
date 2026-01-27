@props(['name', 'type' => 'text', 'placeholder' => '', 'icon' => null, 'value' => null])

<div class="flex flex-col gap-1">
    <div @class([
        'flex items-center gap-3 px-4 py-3 rounded-xl border bg-white transition',
        'border-gray-200 focus-within:border-green-600 focus-within:ring-1 focus-within:ring-green-600' => !$errors->has(
            $name),
        'border-red-400 ring-1 ring-red-400' => $errors->has($name),
    ])>
        @if ($icon)
            {{ $icon }}
        @endif

        <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->merge([
                'class' => 'w-full bg-transparent text-green-900 placeholder-gray-400 focus:outline-none text-base',
            ]) }} />
    </div>

    @error($name)
        <p class="text-sm text-red-600 px-1">
            {{ $message }}
        </p>
    @enderror
</div>
