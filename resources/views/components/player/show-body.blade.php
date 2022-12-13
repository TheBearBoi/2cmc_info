<h1>{{ $name }}</h1>
<h2>{{ $pronouns }}</h2>
<p>{{ $record }}</p>
<ol class="mostPlayedCards">
    <h2>Most Played Cards:</h2>
    {{ $most_played }}
</ol>
<table class="recentDecks">
    <caption><h2 class='section-header'>Previous Decks</h2></caption>
    {{ $recent_decks }}
</table>
