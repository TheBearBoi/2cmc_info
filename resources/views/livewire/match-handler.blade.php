<tr>
    <td>{{ $match->seat_1->player->player_name }}</td>
    @if($match->seat_2)
        <td><input type="number" wire:model="match.player_1_wins" min="0" class="w-4 bg-slate-300 rounded"></td>
    @endif
    <td>{{ $match->seat_2->player->player_name ?? 'BYE' }}</td>
    @if($match->seat_2)
        <td><input type="number" wire:model="match.player_2_wins" min="0" class="w-4 bg-slate-300 rounded"></td>
        <td><input type="number" wire:model="match.draws" min="0" class="w-4 bg-slate-300 rounded"></td>
        <td>
            <button wire:click="submitResults()">
                @if($match->is_submitted)
                    Update
                @else
                    Submit
                @endif
            </button>
        </td>
    @endif
</tr>
