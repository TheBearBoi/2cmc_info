<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model for the Draft Match Object
 *
 * @package App\Models
 * @property int $draft_match_id
 * @property int $draft_id
 * @property int $round_number
 * @property int $seat_1_id
 * @property int $seat_2_id
 * @property int $player_1_wins
 * @property int $player_2_wins
 * @property int $draws
 * @property int $is_submitted
 * @property-read \App\Models\Draft|null $draft
 * @property-read \App\Models\DraftSeat|null $seat_1
 * @property-read \App\Models\DraftSeat|null $seat_2
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch query()
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch whereDraftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch whereDraftMatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch whereDraws($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch whereIsSubmitted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch wherePlayer1Wins($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch wherePlayer2Wins($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch whereRoundNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch whereSeat1Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DraftMatch whereSeat2Id($value)
 * @mixin \Eloquent
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
