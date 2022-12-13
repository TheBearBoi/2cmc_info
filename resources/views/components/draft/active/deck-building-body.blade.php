<table>
    <tr>
        <th>Seat</th>
        <th>Player</th>
        <th>Submit Deck</th>
    </tr>
    {{ $players }}
</table>
@livewire('next-round', ['label' => "Begin Round 1", 'draft' => $draft])
