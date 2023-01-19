<x-main-layout :leaderboard="true">
    <x-slot:title>Statistics</x-slot:title>
    <x-slot:body>
        <x-statistics-body>
            <x-slot:player_leaderboard>
                @foreach($players_and_records as $player_and_record)
                    <tr>
                        <td class="text-center">{{ $player_and_record->total_trophies }} <i class="fa-solid fa-trophy text-amber-500"></i></td>
                        <td><a href={{ route('players.show', $player_and_record->player_id) }}>{{ $player_and_record->player_name }}</a></td>
                        <td class="text-right">{{ round($player_and_record->calc_win_rate, 2) }}%</td>
                    </tr>
                @endforeach
            </x-slot:player_leaderboard>
            <x-slot:card_leaderboard>
                @foreach($cards_and_records as $card_and_record)
                    <tr>
                        <td class="text-center">{{ $card_and_record->total_trophies }} <i class="fa-solid fa-trophy text-amber-500"></i></td>
                        <td><x-card.hover-link :card="$card_and_record" /></td>
                        <td class="text-right">{{ round($card_and_record->calc_win_rate, 2) }}%</td>
                    </tr>
                @endforeach
            </x-slot:card_leaderboard>
            <x-slot:color_stats>
                @foreach($color_stats as $color_stat)
                    <tr>
                        <td class="text-center">{{ $color_stat->trophies }} <i class="fa-solid fa-trophy text-amber-500"></i></td>
                        <td>{{ $color_stat->color  }}</td>
                        <td>{{ $color_stat->times_drafted }}</td>
                        <td>{{ $color_stat->record }}</td>
                        <td>{{ $color_stat->win_rate }}%</td>
                    </tr>
                @endforeach
            </x-slot:color_stats>
            <x-slot:archetype_stats>
                @foreach($archetype_stats as $archetype_stat)
                    <tr>
                        <td class="text-center">{{ $archetype_stat->trophies }} <i class="fa-solid fa-trophy text-amber-500"></i></td>
                        <td>{{ $archetype_stat->archetype  }}</td>
                        <td>{{ $archetype_stat->times_drafted }}</td>
                        <td>{{ $archetype_stat->record }}</td>
                        <td>{{ $archetype_stat->win_rate }}%</td>
                        </td>
                    </tr>
                @endforeach
            </x-slot:archetype_stats>
        </x-statistics-body>
    </x-slot:body>
</x-main-layout>
