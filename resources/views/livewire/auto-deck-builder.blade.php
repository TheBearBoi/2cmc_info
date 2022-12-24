<div x-data="{ open: @entangle('show') }">
    <button wire:click="toggle_scanner" x-show="!open">Automatic</button>
    <div  x-show="open" x-cloak class="absolute inset-4 rounded-lg border-black border-8 bg-slate-300">
        <img src="{{ $this->most_recent_card->faces->first()->large_image_uri }}" alt="{{ $this->most_recent_card->name }}" class="h-full"/>
        <ul>
            @foreach($this->deck_card_names as $card_name)
                <li>{{ $card_name }}</li>
            @endforeach
        </ul>
    </div>
</div>
