<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model for the Draft Object
 *
 * @package App\Models
 * @property int $draft_id
 * @property int $phase
 * @property int $is_team_draft
 * @property string $round_time
 * @property string|null $round_end_time
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Deck[] $decks
 * @property-read int|null $decks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DraftMatch[] $matches
 * @property-read int|null $matches_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Player[] $players
 * @property-read int|null $players_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DraftSeat[] $seats
 * @property-read int|null $seats_count
 * @method static \Illuminate\Database\Eloquent\Builder|Draft newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Draft newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Draft query()
 * @method static \Illuminate\Database\Eloquent\Builder|Draft whereDraftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Draft whereIsTeamDraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Draft wherePhase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Draft whereRoundEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Draft whereRoundTime($value)
 * @mixin \Eloquent
 */
class Draft extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'draft_id';

    protected $table = 'drafts';

    protected $with = ['seats', 'players', 'decks'];

    protected $fillable = ['phase', 'is_team_draft', 'round_time', 'round_end_time'];

    /**
     * Get the seats for this draft
     *
     * @return HasMany
     */
    public function seats(): HasMany
    {
        return $this->hasMany(DraftSeat::class, 'draft_id', 'draft_id');
    }

    /**
     * Get the matches for this draft
     *
     * @return HasMany
     */
    public function matches(): HasMany
    {
        return $this->hasMany(DraftMatch::class, 'draft_id', 'draft_id');
    }

    /**
     * Get the players playing in this draft
     *
     * @return BelongsToMany
     */
    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'draft_seats', 'player_id', 'draft_id', 'draft_id', 'player_id');
    }

    /**
     * Get the decks being played in this draft
     *
     * @return BelongsToMany
     */
    public function decks(): BelongsToMany
    {
        return $this->belongsToMany(Deck::class,'draft_seats',  'deck_id', 'draft_id', 'draft_id', 'deck_id');
    }
}
