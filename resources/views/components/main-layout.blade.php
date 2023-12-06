<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    @livewireStyles

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/17a9ef067f.js" crossorigin="anonymous"></script>
</head>
<body class="bg-slate-100">
{{--create_sidebar_and_navbar();--}}
<x-shared.nav-bar />
<div class="relative m-0">
    <x-shared.side-bar :leaderboard="$leaderboard" :currentdraft="$current_draft" />
    <div class="w-[calc(100%-16rem)] m-0 p-8">
            {{ $body }}
    </div>
</div>
@livewireScripts
</body>
</html>
