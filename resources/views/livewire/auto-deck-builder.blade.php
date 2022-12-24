<div x-data="{ open: @entangle('show') }">
    <button wire:click="toggle_scanner" x-show="!open">Automatic</button>
    <div  x-show="open" x-cloak>
        <img src="{{ $this->most_recent_card->faces->first()->large_image_uri }}" />
        <ul>
            @foreach($this->deckcardnames as $card_name)
                <li>{{ $card_name }}</li>
            @endforeach
        </ul>
    </div>
</div>
