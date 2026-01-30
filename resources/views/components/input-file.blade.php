@props(['name', 'placeholder' => 'Upload your CV', 'icon' => null, 'accept' => '.pdf,.doc,.docx'])

<div x-data="{ fileName: null }" class="flex flex-col gap-1">
    <div @class([
        'flex items-center gap-3 px-4 py-3 rounded-xl border border-dashed bg-white transition cursor-pointer',
        'border-gray-300 focus-within:border-green-600 focus-within:ring-1 focus-within:ring-green-600' => !$errors->has(
            $name),
        'border-red-400 ring-1 ring-red-400' => $errors->has($name),
    ])>
        @if ($icon)
            {{ $icon }}
        @endif

        <label class="flex-1 cursor-pointer">
            <span class="text-base" :class="fileName ? 'text-green-700 font-medium' : 'text-gray-400'"
                x-text="fileName ?? '{{ $placeholder }}'"></span>

            <input type="file" name="{{ $name }}" accept="{{ $accept }}" class="hidden"
                @change="fileName = $event.target.files[0]?.name ?? null" {{ $attributes }} />
        </label>
    </div>

    @error($name)
        <p class="text-sm text-red-600 px-1">
            {{ $message }}
        </p>
    @enderror
</div>
