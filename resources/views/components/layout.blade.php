<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
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
        <x-header />
        <div class="max-w-7xl mx-auto py-12 space-y-6 px-6 md:px-0">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
