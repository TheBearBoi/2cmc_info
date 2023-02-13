<div class="m-auto text-center">
    <h1 class="text-2xl font-semibold">{{ $deck_name }}</h1>
    <h2>{{ $record }} {{ $color }} {{ $archetype }}</h2>
    <h2>{{ $player }}</h2>
</div>
<span>
    <div>
        <h2>Main Deck</h2>
        <div class="flex flex-col flex-wrap flex-auto">
            {{ $main_deck }}
        </div>
    </div>
    <div>
        <h2>Sideboard</h2>
        <ul>
            {{ $sideboard }}
        </ul>
    </div>
</span>
