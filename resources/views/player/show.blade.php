<x-main-layout>
    <x-slot:title>{{ $player->player_name }}</x-slot:title>
    <x-slot:body>
        <x-player.show-body>
            <x-slot:name>{{ $player->player_name }}</x-slot:name>
            <x-slot:pronouns>{{ $player->pronouns }}</x-slot:pronouns>
            <x-slot:record>{{ $player->wins }} Wins {{ $player->losses }} Losses {{ $player->draws }} Draws {{ $player->trophies }} Trophies</x-slot:record>
            <x-slot:most_played>
                @foreach($player->MostPlayedWith() as $row)
                    <li><x-card.hover-link :card="$row['card']" /></li>
                @endforeach
            </x-slot:most_played>
            <x-slot:recent_decks>
                @foreach($player->decks()->take(5)->get() as $deck)
                    <tr>
                        <td><a href={{ route('decks.show', $deck->deck_id) }}>{{ $deck->deck_name }}</a></td>
                        <td><a href={{ route('players.show', $deck->player->player_id) }}>{{ $deck->player->player_name }}</a></td>
                        <td>{{ $deck->wins }}-{{ $deck->losses }}-{{ $deck->draws }}</td>
                    </tr>
                @endforeach
            </x-slot:recent_decks>
        </x-player.show-body>
    </x-slot:body>
</x-main-layout>
