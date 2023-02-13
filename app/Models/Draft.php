<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model for the Draft Object
 *
 * @package App\Models
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
