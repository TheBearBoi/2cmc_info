<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\ColorTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * Model for the Deck Object
 *
 * @package App\Models
 */
class Deck extends Model
{
    use ColorTrait;

    public $timestamps = false;
    protected $primaryKey = 'deck_id';

    protected $fillable = [
        'deck_name',
        'player_id',
        'archetype',
        'color',
        'wins',
        'losses',
        'draws',
        'is_trophy'
    ];

    protected $table = 'decks';

    /**
     * Get the Card objects for each card in this decks main deck
     *
     * @return BelongsToMany
     */
    public function main_deck(): BelongsToMany
    {
        return $this->belongsToMany(Card::class, 'deck_contents','deck_id','oracle_id')
            ->where('is_sideboard',false)
            ->withPivot('quantity');
    }

    /**
     * Get the Card objects for each card in this decks sideboard
     *
     * @return BelongsToMany
     */
    public function sideboard(): BelongsToMany
    {
        return $this->belongsToMany(Card::class, 'deck_contents','deck_id','oracle_id')
            ->where('is_sideboard',true)
            ->withPivot('quantity');
    }

    /**
     * Get the player who played this deck
     *
     * @return BelongsTo
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class,'player_id', 'player_id');
    }

    /**
     * Get the seat this deck was played in
     *
     * @return HasOne
     */
    public function draft_seat(): HasOne
    {
        return $this->hasOne(DraftSeat::class);
    }

    /**
     * Get the draft this deck was drafted in
     *
     * @return HasOneThrough
     */
    public function draft(): HasOneThrough
    {
        return $this->hasOneThrough(Draft::class,DraftSeat::class,);
    }
}
