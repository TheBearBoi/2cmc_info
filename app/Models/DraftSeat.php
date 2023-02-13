<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model for the Draft Seat Object
 *
 * @package App\Models
 */
class DraftSeat extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'seat_id';
    protected $table = 'draft_seats';

    protected $fillable = ['seat_number', 'draft_id', 'player_id', 'deck_id', 'team_number'];

    /**
     * Get the draft this seat is a part of
     *
     * @return BelongsTo
     */
    public function draft(): BelongsTo
    {
        return $this->belongsTo(Draft::class, 'draft_id', 'draft_id');
    }

    /**
     * Get the player that is sitting in this seat
     *
     * @return BelongsTo
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_id', 'player_id');
    }

    /**
     * Get the deck that is being played in this seat
     *
     * @return BelongsTo
     */
    public function deck(): BelongsTo
    {
        return $this->belongsTo(Deck::class, 'deck_id', 'deck_id');
    }
}
