<form wire:submit.prevent="submitNewDeck">
    @csrf
    <label for="name">Deck Name:</label><input id="name" name="name" type="text" wire:model.defer="deck_name"><br />
    <label for="archetype">Archetype:</label><input id="archetype" name="archetype" type="text" wire:model.defer="archetype"><br />
    <label for="main_deck">Main Deck:</label><br />
    <textarea id="main_deck" name="main_deck" wire:model.defer="main_deck" rows="4" cols="50"></textarea>
    <label for="sideboard">Sideboard:</label><br />
    <textarea id="sideboard" name="sideboard" wire:model.defer="sideboard" rows="4" cols="50"></textarea>
    <button value="submitNewDeck()">Submit</button>
</form>
