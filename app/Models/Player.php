<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model for the Player Object
 *
 * @package App\Models
 */
class Player extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'player_id';

    protected $fillable = ['player_name'];

    protected $table = 'players';

    /**
     * Get the decks this player has played
     *
     * @return HasMany
     */
    public function decks(): HasMany
    {
        return $this->hasMany(Deck::class, 'player_id', 'player_id');
    }

    /**
     * Get the draft seats this player has sat in
     *
     * @return HasMany
     */
    public function draft_seats(): HasMany
    {
        return $this->hasMany(DraftSeat::class);
    }

    /**
     * Get the drafts this player has played in
     *
     * @return BelongsToMany
     */
    public function drafts(): BelongsToMany
    {
        return $this->belongsToMany(Draft::class, 'draft_seats');
    }

    /**
     * Get the players win rate
     *
     * @return float|int|null
     */
    public function getWinRateAttribute(): float|int|null
    {
        return $this->decks
            ->avg('win_rate');
    }

    /**
     * Get the players total wins
     *
     * @return int
     */
    public function getWinsAttribute(): int
    {
        return $this->getRecordValues('wins');
    }

    /**
     * get the players total losses
     *
     * @return int
     */
    public function getLossesAttribute(): int
    {
        return $this->getRecordValues('losses');
    }

    /**
     * get the players total draws
     *
     * @return int
     */
    public function getDrawsAttribute(): int
    {
        return $this->getRecordValues('draws');
    }

    /**
     * get the players total trophies
     *
     * @return int
     */
    public function getTrophiesAttribute(): int
    {
        return $this->getRecordValues('is_trophy');
    }

    /**
     * Get the top 5 most played nonbasic cards
     *
     * @return array
     */
    public function MostPlayedWith(): array
    {
        $array = [];
        //rewrite to check based on pivot table
        $cards = $this->decks()
            ->get()
            ->flatMap(function ($deck) {
                return $deck->main_deck()
                    ->where('is_basic', false)
                    ->get();
            })
            ->countBy('oracle_id')
            ->sortDesc()
            ->take(5);
        foreach ($cards as $oracle_id => $count)
        {
            $array[] = ['card' => Card::find($oracle_id),
                'count' => $count];
        }
        return $array;
    }

    /**
     * Helper function for accessing the record of the player.
     *
     * @param string $v
     * @return int
     */
    protected function getRecordValues(string $v): int
    {
        return $this->decks
            ->sum($v);
    }
}
