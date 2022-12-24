<div x-data="{ open: @entangle('show') }">
    <button wire:click="toggle_scanner" x-show="!open">Automatic</button>
    <div  x-show="open" x-cloak class="absolute inset-4 rounded border-slate-900">
        <img src="{{ $this->most_recent_card->faces->first()->large_image_uri }}" alt="{{ $this->most_recent_card->name }}"/>
        <ul>
            @foreach($this->deck_card_names as $card_name)
                <li>{{ $card_name }}</li>
            @endforeach
        </ul>
    </div>
</div>
