<div>
    <div class='text-center mb-6'><div class='inline-block text-2xl font-semibold'>{{ $card->faceName ?? $card->name }}</div><div class="inline-block ml-2">{{ $card->manaCost }}</div></div>
    <p class='text-lg my-2'>{{ $card->type }}</p>
    <p>{!! nl2br(e($card->text)) !!}</p>
    @isset($card->power)
        <p class='text-right text-lg my-2'> {{ $card->power }}/{{ $card->toughness }} </p>
    @endisset
</div>
