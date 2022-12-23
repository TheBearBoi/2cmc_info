<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    @livewireStyles


    @vite('resources/css/app.css')
</head>
<body>
{{--create_sidebar_and_navbar();--}}
<x-shared.nav-bar />
<x-shared.side-bar :leaderboard="$leaderboard" :currentdraft="$current_draft" />
<div class="w-[calc(100%-16rem)]">
    {{ $body }}
</div>
@livewireScripts
@vite('resources/js/app.js')
</body>
</html>
