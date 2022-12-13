<x-main-layout :leaderboard="true">
    <x-slot:title>Leaderboard</x-slot:title>
    <x-slot:body>
        <x-leaderboard-body>
            <x-slot:player_leaderboard>
                @foreach($players_and_records as $player_and_record)
                    <tr>
                        <td><a href={{ route('players.show', $player_and_record->player_id) }}>{{ $player_and_record->player_name }}</a></td>
                        <td>{{ $player_and_record->wins }}</td>
                        <td>{{ $player_and_record->trophies }}</td>
                        <td>{{ $player_and_record->win_rate }}%</td>
                        </tr>
                @endforeach
            </x-slot:player_leaderboard>
            <x-slot:card_leaderboard>
                @foreach($cards_and_records as $card_and_record)
                    <tr>
                        <td><x-card.hover-link :card="$card_and_record" /></td>
                        <td>{{ $card_and_record->wins }}</td>
                        <td>{{ $card_and_record->trophies }}</td>
                        <td>{{ $card_and_record->win_rate }}%</td>
                    </tr>
                @endforeach
            </x-slot:card_leaderboard>
        </x-leaderboard-body>
    </x-slot:body>
</x-main-layout>
