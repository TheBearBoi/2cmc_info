<div class="leaderboard_page_wrapper">
    <table class="player_leaderboard">
        <caption>Player Leaderboard</caption>
        <tr>
            <th>Name</th>
            <th>Total Wins</th>
            <th>Total Trophies</th>
            <th>Win Rate</th>
        </tr>
        {{ $player_leaderboard }}
    </table>
    <table class="card_leaderboard">
        <caption>Card Leaderboard</caption>
        <tr>
            <th>Card Name</th>
            <th>Total Wins</th>
            <th>Total Trophies</th>
            <th>Win Rate</th>
        </tr>
        {{ $card_leaderboard }}
    </table>
</div>
