<x-main-layout>
    <x-slot:title>{{ $card->name }}</x-slot:title>
    <x-slot:body>
        <x-card.show-body>
            <x-slot:image><x-card.primary-image :card="$card" /></x-slot:image>
            <x-slot:oracle_text>
                <x-card.oracle-text :card="$card" />
                @foreach($card->otherFaces as $face)
                    <x-card.oracle-text :card="$face" />
                @endforeach
            </x-slot:oracle_text>
            <x-slot:rulings>
                @foreach($card->rulings as $ruling)
                    <tr>
                        <td>{{ $ruling->date }}</td>
                        <td>{{ $ruling->text }}</td>
                    </tr>
                @endforeach
            </x-slot:rulings>
            <x-slot:record>
                {{ $card->wins }} Wins {{ $card->losses }} Losses {{ $card->draws }} Draws {{ $card->trophies }} Trophies
            </x-slot:record>
            <x-slot:play_rate>Played in the Maindeck {{ $card->main_deck_rate }}% of the time.</x-slot:play_rate>
            <x-slot:often_played_with>
                @foreach($card->MostPlayedWith() as $row)
                    <li class="text-sm"><x-card.hover-link :card="$row['card']" /></li>
                @endforeach
            </x-slot:often_played_with>
            <x-slot:recent_decks>
                @foreach($card->decks()->take(5)->get() as $deck)
                    <tr class="text-sm text-left">
                        <td><a href={{ route('decks.show', $deck->deck_id) }}>{{ $deck->deck_name }}</a></td>
                        <td><a href={{ route('players.show', $deck->player->player_id) }}>{{ $deck->player->player_name }}</a></td>
                        <td>{{ $deck->wins }}-{{ $deck->losses }}-{{ $deck->draws }}</td>
                        <td>{{ $deck->pivot->is_sideboard? 'Side' : 'Main' }}</td>
                    </tr>
                @endforeach
            </x-slot:recent_decks>
        </x-card.show-body>
    </x-slot:body>
</x-main-layout>
