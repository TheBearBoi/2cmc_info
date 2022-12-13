<div class='absolute right-0 bg-blue-200 bottom-0 top-[3.125rem] w-64  border-l-2 border-slate-400'>
    @unless($leaderboard === false)
        <table class='m-auto'>
            <caption class="text-lg font-semibold">Leaderboard</caption>
        </table>
    @endunless
    @unless($current_draft === false)
        <table class='m-auto'>
            <caption class="text-lg font-bold">Most Recent Draft</caption>
            <tr>
                <th>Seat</th>
                <th>Deck</th>
                <th>Player</th>
                <th>Record</th>
            </tr>
        </table>
    @endunless
</div>
