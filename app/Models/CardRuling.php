<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model for the Card Rulings Object
 *
 * @package App\Models
 * @property int|null $id
 * @property string|null $date
 * @property string|null $text
 * @property string|null $uuid
 * @property-read \App\Models\Card|null $card
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling query()
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereUuid($value)
 * @mixin \Eloquent
 */
class CardRuling extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $table = 'cardRulings';

    /**
     * Get the Card object this ruling belongs to
     *
     * @return BelongsTo
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class,'uuid','uuid');
    }
}
