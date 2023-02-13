<div x-data="{ open: false }" x-cloak class="truncate inline-block">
    <a href="{{ route('cards.show', $card->name) }}" @mouseenter="open = ! open" @mouseleave="open = ! open">
        {{ $card->name }}
    </a>
    <img x-show="open" src="{{ $card->faces->first()->png_uri }}" alt="$card->name" class="absolute w-56">
</div>
