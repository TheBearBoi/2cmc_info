<div class='absolute right-0 bg-blue-200 bottom-0 top-0 w-64  border-l-2 border-slate-400'>
    @unless($leaderboard === true)
        <div class='my-8'>
            <table class="w-fit mx-auto text-center">
                <caption class="text-xl font-semibold">Leaderboard</caption>
                @foreach($current_leaderboard as $player_and_record)
                    <tr>
                        <td  class="text-center text-sm">
                            {{ $player_and_record->trophies }} <i class="fa-solid fa-trophy text-amber-500"></i>
                        </td>
                        <td class="text-left text-sm">
                            <a href={{ route('players.show', $player_and_record->player_id) }}>
                                {{ $player_and_record->player_name }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endunless
    @unless($current_draft === true)
        <table class='m-auto'>
            <caption class="text-lg font-semibold">Most Recent Draft</caption>
            <tr>
                <td>Seat</td>
                <td>Deck</td>
                <td>Player</td>
                <td>Record</td>
            </tr>
        </table>
    @endunless
</div>
