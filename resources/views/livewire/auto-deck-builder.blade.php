<div x-data="{ open: @entangle('show') }">
    <button wire:click="toggle_scanner" x-show="!open">Automatic</button>
    <div x-show="open" x-cloak class="absolute inset-0 bg-opacity-80 bg-black">
        <div>
            <label for="name{{ $seat->seat_id }}">Deck Name:</label><input id="name{{ $seat->seat_id }}" name="name{{ $seat->seat_id }}" type="text" wire:model.defer="deck_name"><br />
            <label for="archetype{{ $seat->seat_id }}">Archetype:</label><input id="archetype{{ $seat->seat_id }}" name="archetype{{ $seat->seat_id }}" type="text" wire:model.defer="archetype"><br />
            <label for="color{{ $seat->seat_id }}">Color:</label><br />
            <input type="checkbox" id="white{{ $seat->seat_id }}" name="white{{ $seat->seat_id }}" value="W" wire:model.defer="colors.W">
            <label for="white{{ $seat->seat_id }}">W</label><br>
            <input type="checkbox" id="blue{{ $seat->seat_id }}" name="blue{{ $seat->seat_id }}" value="U" wire:model.defer="colors.U">
            <label for="blue{{ $seat->seat_id }}">U</label><br>
            <input type="checkbox" id="black{{ $seat->seat_id }}" name="black{{ $seat->seat_id }}" value="B" wire:model.defer="colors.B">
            <label for="black{{ $seat->seat_id }}">B</label><br>
            <input type="checkbox" id="red{{ $seat->seat_id }}" name="red{{ $seat->seat_id }}" value="R" wire:model.defer="colors.R">
            <label for="red{{ $seat->seat_id }}">R</label><br>
            <input type="checkbox" id="green{{ $seat->seat_id }}" name="green{{ $seat->seat_id }}" value="G" wire:model.defer="colors.G">
            <label for="green{{ $seat->seat_id }}">G</label><br>
        </div>
        <div  class="absolute inset-8 rounded-lg border-black border-8 bg-slate-300 p-4 flex">
            <img src="{{ $this->most_recent_card->faces->first()->large_image_uri }}" alt="{{ $this->most_recent_card->name }}" class="h-full"/>
            <ul>
                <li class="text-lg">Main Deck</li>
                @foreach($this->main_deck_list as $value)
                    <li>{{ $value['quantity'] }}x {{ $value['card']['name'] }}</li>
                @endforeach
            </ul>
            <ul>
                <li class="text-lg">Sideboard</li>
                @foreach($this->sideboard_list as $value)
                    <li>{{ $value['quantity'] }}x {{ $value['card']['name'] }}</li>
                @endforeach
            </ul>
            <button class="absolute p-2 w-24 inset-x-0 bottom-4 border-black bg-slate-500 rounded-lg mx-auto" wire:click="CreateDeck()">Submit</button>
        </div>
    </div>
</div>
