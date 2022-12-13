<div x-data="{ open: false }">
    <a href="{{ route('cards.show', $card->name) }}" @mouseenter="open = ! open" @mouseleave="open = ! open">
        {{ $card->name }}
    </a>
    <img x-show="open" x-cloak src={{ $card->faces->first()->small_image_uri }} class="absolute">
</div>
