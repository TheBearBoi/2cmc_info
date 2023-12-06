<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model for the Draft Seat Object
 *
 * @package App\Models
 * @property int $seat_id
 * @property int|null $draft_id
 * @property int|null $seat_number
 * @property int $player_id
 * @property int|null $team_number
 * @property int|null $deck_id
 * @property-read \App\Models\Deck|null $deck
 * @property-read \App\Models\Draft|null $draft
 * @property-read \App\Models\Player|null $player
 * @method static \Illuminate\Database\Eloquent\Builder|DraftSeat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DraftSeat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DraftSeat query()
 * @method static \Illuminate\Database\Eloquent\Builder|DraftSeat whereDeckId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftSeat whereDraftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftSeat wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftSeat whereSeatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftSeat whereSeatNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftSeat whereTeamNumber($value)
 * @mixin \Eloquent
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
