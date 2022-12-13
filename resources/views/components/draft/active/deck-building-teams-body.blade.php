<table>
    <caption>Team 1</caption>
    <tr>
        <th>Seat</th>
        <th>Player</th>
        <th>Submit Deck</th>
    </tr>
    {{ $team_1 }}
</table>
<table>
    <caption>Team 2</caption>
    <tr>
        <th>Seat</th>
        <th>Player</th>
        <th>Submit Deck</th>
    </tr>
    {{ $team_2 }}
</table>
@livewire('next-round', ['label' => "Begin Round 1", 'draft' => $draft])
