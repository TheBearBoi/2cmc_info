<x-main-layout>
    <x-slot:title>Leaderboard</x-slot:title>
    <x-slot:body>
        <x-statistics-body>
            <x-slot:color_stats>
                @foreach($color_stats as $color_stat)
                    <tr>
                        <td>{{ $color_stat->color  }}</td>
                        <td>{{ $color_stat->times_drafted }}</td>
                        <td>{{ $color_stat->record }}</td>
                        <td>{{ $color_stat->trophies }}</td>
                        <td>{{ $color_stat->win_rate }}</td>
                    </tr>
                @endforeach
            </x-slot:color_stats>
            <x-slot:archetype_stats>
                @foreach($archetype_stats as $archetype_stat)
                    <tr>
                        <td>{{ $archetype_stat->archetype  }}</td>
                        <td>{{ $archetype_stat->times_drafted }}</td>
                        <td>{{ $archetype_stat->record }}</td>
                        <td>{{ $archetype_stat->trophies }}</td>
                        <td>{{ $archetype_stat->win_rate }}</td>
                        </td>
                    </tr>
                @endforeach
            </x-slot:archetype_stats>
        </x-statistics-body>
    </x-slot:body>
</x-main-layout>
