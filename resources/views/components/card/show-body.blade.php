<div class="flex flex-wrap m-2 justify-items-center justify-center">
    <div class="m-1">{{ $image }}</div> <!--Make it so it flips when clicked-->
    <div class="flex-initial basis-96 m-1 p-4 bg-slate-300 ring-8 ring-black ring-inset rounded-lg">
        <div class='oracleText'>
            {{ $oracle_text }}
        </div>
        <table>
            <tr>
                <th>Date</th>
                <th>Ruling</th>
            </tr>
            {{ $rulings }}
        </table>
    </div>
    <div class="flex-initial basis-96 m-1 p-4 bg-slate-300 ring-8 ring-black ring-inset rounded-lg">
        <div class="card-record">
            <h2 class="section-header">Record</h2>
            <p class='cardRecord'>{{ $record }}</p>
            <p class='playRate'>{{ $play_rate }}</p>
        </div>
            <div class="mostPlayedTogether">
                <h2 class='section-header'>Often Played With</h2>
                <ol>
                    {{ $often_played_with }}
                </ol>
            </div>
            <div class="recentDecks">

                <table><caption><h2 class='section-header'>Recent Decks</h2></caption>
                    {{ $recent_decks }}
                </table>
            </div>
    </div>
</div>
