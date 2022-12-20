<div x-data="{ open: @entangle('showManualDeckBuilder') }">
    <button wire:click="$set('showManualDeckBuilder', true)" x-show="!open">Manual</button>
    <div  x-show="open" x-cloak>
        <livewire:deck-builder-popup :seat="$seat" :wire:key="'manual_deck_builder'.$seat->seat_id" />
    </div>
</div>
