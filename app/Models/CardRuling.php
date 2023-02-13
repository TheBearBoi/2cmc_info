<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model for the Card Rulings Object
 *
 * @package App\Models
 */
class CardRuling extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ruling_id';
    protected $guarded = [];

    protected $table = 'card_rulings';

    /**
     * Get the Card object this ruling belongs to
     *
     * @return BelongsTo
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class,'oracle_id','oracle_id');
    }
}
