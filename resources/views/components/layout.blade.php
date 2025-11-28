<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite('resources/css/app.css')
    </head>

<body class="bg-slate-100">
    <x-header />
    <div class="max-w-7xl mx-auto py-12 space-y-6 px-6 md:px-0">
        {{ $slot }}
    </div>
</body>

</html>
