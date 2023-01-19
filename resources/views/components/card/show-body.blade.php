<div class="flex flex-none flex-wrap justify-items-center justify-center">
    <div class="mr-4 h-[calc(100vh-9rem)] aspect-[2.5/3.5]">{{ $image }}</div>
    <div class="ml-4 bg-black border-[calc(.028*(100vh-9rem))] border-black rounded-[calc(.028*(100vh-9rem))] h-[calc((100vh-9rem))] aspect-[2.5/3.5]">
        <div class="border-slate-300 bg-slate-300 rounded-lg border-[calc(.014*(100vh-9rem))] p-4 h-full overflow-y-auto">
            {{ $oracle_text }}
            <div class="m-auto w-max text-center mb-2">
                <h2 class="text-2xl font-semibold">Record</h2>
                <p class="text-sm">{{ $record }}</p>
                <p class="text-sm">{{ $play_rate }}</p>
            </div>
            <div class="text-center flex flex-auto flex-wrap items-start">
                <div class="mx-auto w-fit">
                    <h2 class="text-2xl font-semibold">Often Played With</h2>
                    <ul class="mx-auto text-left w-min">
                        {{ $often_played_with }}
                    </ul>
                </div>
                <div class="mx-auto w-fit">
                    <table>
                        <caption><h2 class="text-2xl font-semibold">Latest Decks</h2></caption>
                        {{ $recent_decks }}
                    </table>
                </div>
            </div>
            @unless($rulings=="")
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Ruling</th>
                    </tr>
                    {{ $rulings }}
                </table>
            @endunless
        </div>
    </div>
</div>
