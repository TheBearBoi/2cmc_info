<form wire:submit.prevent="createDraft">
    @csrf
    <label for="team">Team Draft:</label><input type="checkbox" id="team" name="team" wire:model="is_team_draft"><br />
    <label for="round-time">Round Timer (mins):</label> <input type="text" id="round-time" wire:model="round_time"><br />
    <table class="mx-auto border-spacing-x-4">
        <tr>
            <th>Player</th>
            <th>Assigned Seat</th>
            <th>Remove Player</th>
        </tr>

        @foreach($draft_seats as $key => $draft_seat)
            <tr>
                <td>{{ $draft_seat["player"]["player_name"]}}</td>
                <td><select wire:model="draft_seats.{{ $key }}.seat_number">
                        <option value=""></option>
                        @foreach(range(1,$player_count, 1) as $i)

                            <option value="{{ $i }}">{{ $i }}</option>
                        @endforeach
                    </select></td>
                <td><button wire:click.prevent="removePlayer({{ $draft_seat['player']['player_id'] }})">Remove</button></td>
            </tr>
        @endforeach
    </table>
    <input class="bg-slate-300" type="text" list="previous-players" value="" wire:model="new_player_name">
    <div class="absolute bottom-8">
        <button wire:click.prevent="addPlayer()" class="mx-auto">Add Player</button>
        <datalist id="previous-players">
            @foreach($remaining_previous_players as $previous_player)
                <option value="{{ $previous_player->player_name }}"></option>
            @endforeach
        </datalist><br />
        <button type="submit" value="createDraft()" class="mx-auto">Create New Draft</button>
    </div>
</form>
