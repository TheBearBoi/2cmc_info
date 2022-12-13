<x-main-layout>
    <x-slot:title>{{ $deck->deck_name }}</x-slot:title>
    <x-slot:body>
        <x-deck.show-body>
            <x-slot:deck_name>{{ $deck->deck_name }}</x-slot:deck_name>
            <x-slot:player><a href={{ route('players.show', $deck->player->player_id) }}>{{ $deck->player->player_name }}</a></x-slot:player>
            <x-slot:record>{{ $deck->wins }}-{{ $deck->losses }}-{{ $deck->draws }}</x-slot:record>
            <x-slot:color>{{ $deck->color }}</x-slot:color>
            <x-slot:archetype>{{ $deck->archetype }}</x-slot:archetype>
            <x-slot:main_deck>
                @foreach($deck->main_deck()->get() as $card)
                    <li>{{ $card->pivot->quantity }}x <x-card.hover-link :card="$card" /></li>
                @endforeach
            </x-slot:main_deck>
            <x-slot:sideboard>
                @foreach($deck->sideboard()->get() as $card)
                    <li>{{ $card->pivot->quantity }}x <x-card.hover-link :card="$card" /></li>
                @endforeach
            </x-slot:sideboard>
        </x-deck.show-body>
    </x-slot:body>
</x-main-layout>
