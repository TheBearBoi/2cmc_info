<form wire:submit.prevent="createDraft">
    @csrf
{{--  Todo Move team draft and round timer to bottom of the page!  --}}
    <div class="mx-auto text-center">
        <div>
        <label for="team">Team Draft:</label><input type="checkbox" id="team" name="team" wire:model="is_team_draft">
        <label for="round-time">Round Timer (mins):</label> <input type="text" id="round-time" wire:model="round_time" class="w-8 bg-slate-300">
        </div>
        <input class="bg-slate-300" type="text" list="previous-players" value="" wire:model="new_player_name">
        <button wire:click.prevent="addPlayer()">Add Player</button><br />
        <datalist id="previous-players">
            @foreach($remaining_previous_players as $previous_player)
                <option value="{{ $previous_player->player_name }}"></option>
            @endforeach
        </datalist>
        <button type="submit" value="createDraft()" class="mx-auto">Create New Draft</button>
    </div>
    <table class="mx-auto">
    @foreach($draft_seats as $key => $draft_seat)
            <tr>
                <td>{{ $draft_seat["player"]["player_name"]}}</td>
                <td><button wire:click.prevent="removePlayer({{ $draft_seat['player']['player_id'] }})">Remove</button></td>
                <td><select wire:model="draft_seats.{{ $key }}.seat_number">
                        <option value=""></option>
                    @foreach(range(1,$player_count, 1) as $i)

                            <option value="{{ $i }}">{{ $i }}</option>
                        @endforeach
                    </select></td>
            </tr>
        @endforeach
    </table>
</form>
