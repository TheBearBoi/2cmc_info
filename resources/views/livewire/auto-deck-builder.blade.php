<div x-data="{ open: @entangle('show') }">
    <button wire:click="toggle_scanner" x-show="!open">Automatic</button>
    <div  x-show="open" x-cloak>
        <img src="{{ $most_recent_card->faces->first()->large_image_uri }}" />
        <div>
            @foreach($deck as $card)
                <p>{{ $card->name }}</p>
            @endforeach
        </div>
    </div>
</div>
