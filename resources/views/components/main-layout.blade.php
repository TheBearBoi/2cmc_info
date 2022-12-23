<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    @livewireStyles

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @livewireScripts
</head>
<body>
{{--create_sidebar_and_navbar();--}}
<x-shared.nav-bar />
<x-shared.side-bar :leaderboard="$leaderboard" :currentdraft="$current_draft" />
<div class="w-[calc(100%-16rem)]">
    {{ $body }}
</div>

</body>
</html>
