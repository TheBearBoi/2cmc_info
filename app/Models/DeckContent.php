<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Model for the Deck Contents Entry Object
 *
 * @package App\Models
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
        return $this->belongsTo(Card::class,'oracle_id','oracle_id');
    }
}
