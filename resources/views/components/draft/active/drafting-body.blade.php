<table>
    <tr>
        <th>Seat</th>
        <th>Player</th>
    </tr>
    {{ $players }}
</table>
@livewire('to-deck-building', ['label' => "Advance to Deck Building", 'draft' => $draft])
