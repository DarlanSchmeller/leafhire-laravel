<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} | Work That Supports Your Well-Being</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-slate-100">
    <div class="
        fixed inset-0
        bg-cover bg-center bg-no-repeat
        opacity-6
        pointer-events-none
        z-0
    "
        style="background-image: url('{{ asset('images/leaves-background.webp') }}');"></div>


    <div class="relative z-10">
        @if (request()->route()->getName() !== 'login')
            <x-header />
        @endif

        <div class="max-w-7xl mx-auto py-12 space-y-6 px-6 md:px-0">
            @if (session('success'))
                <div class="rounded-xl border border-green-200 bg-green-50 p-4 text-green-800 flex items-start gap-3">
                    <x-heroicon-o-check-circle class="w-6 h-6 text-green-600 shrink-0 mt-0.5" />
                    <div>
                        <p class="font-semibold">Success 🎉</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-red-800 flex items-start gap-3">
                    <x-heroicon-o-x-circle class="w-6 h-6 text-red-600 shrink-0 mt-0.5" />
                    <div>
                        <p class="font-semibold">Oops 😬</p>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                </div>
            @endif
            {{ $slot }}
        </div>
    </div>
</body>

</html>
