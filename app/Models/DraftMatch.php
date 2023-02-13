<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model for the Draft Match Object
 *
 * @package App\Models
 */
class DraftMatch extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'draft_match_id';
    protected $table = 'draft_matches';

    protected $fillable = ['draft_id', 'round_number', 'seat_1_id', 'seat_2_id', 'player_1_wins', 'player_2_wins', 'draws', 'is_submitted'];

    /**
     * Get the draft this match is a part of
     *
     * @return BelongsTo
     */
    public function draft(): BelongsTo
    {
        return $this->belongsTo(Draft::class, 'draft_id', 'draft_id');
    }

    /**
     * get the seat object for the first seat
     *
     * @return BelongsTo
     */
    public function seat_1(): BelongsTo
    {
        return $this->belongsTo(DraftSeat::class, 'seat_1_id', 'seat_id');
    }

    /**
     * get the seat object for the second seat
     *
     * @return BelongsTo
     */
    public function seat_2(): BelongsTo
    {
        return $this->belongsTo(DraftSeat::class, 'seat_2_id', 'seat_id');
    }
}
