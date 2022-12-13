<div class="deckInfo">
    <h1 class="deckName">{{ $deck_name }}</h1>
    <h2 class="playerName">{{ $player }}</h2>
    <h2 class="deckMiscInfo">{{ $record }} {{ $color }} {{ $archetype }}</h2>
</div>
<div class="deckList">
    <h2>Main Deck</h2>
    <ul>
        {{ $main_deck }}
    </ul>
    <h2>Sideboard</h2>
    <ul>
        {{ $sideboard }}
    </ul>
</div>
