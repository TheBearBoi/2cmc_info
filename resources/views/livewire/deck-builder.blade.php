<div>
    @unless($showManualDeckBuilder)
        <button wire:click="$set('showManualDeckBuilder', true)">Manual</button>
    @endunless
    @if ($showManualDeckBuilder)
        <livewire:deck-builder-popup :seat="$seat" :wire:key="'manual_deck_builder'.$seat->seat_id" />
    @endif
</div>
