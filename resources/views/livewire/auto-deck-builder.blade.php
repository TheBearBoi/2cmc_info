<div x-data="{ open: @entangle('show') }">
    <button wire:click="toggle_scanner" x-show="!open">Automatic</button>
    <div x-show="open" x-cloak class="absolute inset-0 bg-opacity-80 bg-black">
        <div  class="absolute inset-8 rounded-lg border-black border-8 bg-slate-300 p-4 flex">
            <div class="m-4 grow-0">
                <label for="name{{ $seat->seat_id }}">Deck Name:</label><br />
                <input id="name{{ $seat->seat_id }}" name="name{{ $seat->seat_id }}" type="text" wire:model.defer="deck_name"><br />
                <label for="archetype{{ $seat->seat_id }}">Archetype:</label><br />
                <input id="archetype{{ $seat->seat_id }}" name="archetype{{ $seat->seat_id }}" type="text" wire:model.defer="archetype"><br />
                <label for="color{{ $seat->seat_id }}">Color:</label><br />
                <input type="checkbox" id="white{{ $seat->seat_id }}" name="white{{ $seat->seat_id }}" value="W" wire:model.defer="colors.W">
                <label for="white{{ $seat->seat_id }}">White</label><br>
                <input type="checkbox" id="blue{{ $seat->seat_id }}" name="blue{{ $seat->seat_id }}" value="U" wire:model.defer="colors.U">
                <label for="blue{{ $seat->seat_id }}">Blue</label><br>
                <input type="checkbox" id="black{{ $seat->seat_id }}" name="black{{ $seat->seat_id }}" value="B" wire:model.defer="colors.B">
                <label for="black{{ $seat->seat_id }}">Black</label><br>
                <input type="checkbox" id="red{{ $seat->seat_id }}" name="red{{ $seat->seat_id }}" value="R" wire:model.defer="colors.R">
                <label for="red{{ $seat->seat_id }}">Red</label><br>
                <input type="checkbox" id="green{{ $seat->seat_id }}" name="green{{ $seat->seat_id }}" value="G" wire:model.defer="colors.G">
                <label for="green{{ $seat->seat_id }}">Green</label><br>
                <button class="absolute p-2 w-24 mt-4 border-black bg-slate-500 rounded-lg mx-auto" wire:click="CreateDeck()">Submit</button>
            </div>
            @if(empty($most_recent_card))
                <img src="https://static.wikia.nocookie.net/mtgsalvation_gamepedia/images/f/f8/Magic_card_back.jpg/revision/latest?cb=20140813141013" alt="{{ $this->most_recent_card->name }}" class="h-full"/>
            @else
                <img src="{{ $most_recent_card->faces->first()->png_uri }}" alt="{{ $this->most_recent_card->name }}" class="h-full"/>
            @endif
            <img src="{{ isset($most_recent_card) ? $most_recent_card->faces->first()->png_uri : 'https://static.wikia.nocookie.net/mtgsalvation_gamepedia/images/f/f8/Magic_card_back.jpg/revision/latest?cb=20140813141013' }}" alt="{{ $this->most_recent_card->name }}" class="h-full"/>
            <ul class="m-4 grow">
                <li class="text-lg">Main Deck</li>
                @foreach($this->main_deck_list as $value)
                    <li>{{ $value['quantity'] }}x {{ $value['card']['name'] }}</li>
                @endforeach
            </ul>
            <ul class="m-4 grow">
                <li class="text-lg">Sideboard</li>
                @foreach($this->sideboard_list as $value)
                    <li>{{ $value['quantity'] }}x {{ $value['card']['name'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
