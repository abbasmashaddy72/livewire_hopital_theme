<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode ? 'dark' : '' }}">

<head>
    {{ Vite::useBuildDirectory('/frontendAssets') }}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon" type="image/svg+xml">

    <title>
        @if (\Route::currentRouteName() != 'homepage')
            {{ $title . ' | ' ?? '' }}
        @endif
        {{ config('app.name', 'Laravel') }}
    </title>

    @vite(['resources/css/frontend/app.scss', 'resources/js/frontend/app.ts'])
    @stack('styles')
    @livewireStyles
</head>

<body class="text-base text-black font-nunito dark:text-white dark:bg-slate-900">

    @include('layouts.fePartials.header')

    {{ $slot }}

    @include('layouts.fePartials.footer')

    @livewireScripts
    @stack('scripts')
</body>

</html>
