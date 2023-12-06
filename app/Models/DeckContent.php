<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Model for the Deck Contents Entry Object
 *
 * @package App\Models
 * @property int $deck_content_id
 * @property int $deck_id
 * @property int $quantity
 * @property int $is_sideboard
 * @property string|null $uuid
 * @property-read \App\Models\Card|null $card
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereDeckContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereDeckId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereIsSideboard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereUuid($value)
 * @mixin \Eloquent
 */
class DeckContent extends Pivot
{
    public $timestamps = false;
    protected $primaryKey = 'deck_content_id';

    protected $table = 'deck_contents';

    /**
     * Get the Card object this deck content entry belongs to
     *
     * @return BelongsTo
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class,'uuid','uuid');
    }
}
