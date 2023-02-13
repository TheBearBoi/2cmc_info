<?php

namespace App\Models;

use App\Http\Traits\ColorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model for the Card Object
 *
 * @package App\Models
 */
class Card extends Model
{
    use ColorTrait;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'oracle_id';
    protected $guarded = [];

    protected $with = ['faces'];

    protected $table = 'cards';

    /**
     * Get all the card faces for the card
     *
     * @return HasMany
     */
    public function faces(): HasMany
    {
        return $this->hasMany(CardFace::class,'oracle_id','oracle_id');
    }

    /**
     * If the card is in the cube, get its cube list entry
     *
     * @return BelongsTo
     */
    public function cube_list_entry(): BelongsTo
    {
        return $this->belongsTo(CubeList::class,'oracle_id','oracle_id');
    }

    /**
     * Get all rulings for the card
     *
     * @return HasMany
     */
    public function rulings(): HasMany
    {
        return $this->hasMany(CardRuling::class,'oracle_id','oracle_id');
    }

    /**
     * Get all decks this card has been played in
     *
     * @return BelongsToMany
     */
    public function decks(): BelongsToMany
    {
        return $this->belongsToMany(Deck::class, 'deck_contents','oracle_id','deck_id','oracle_id','deck_id')
            ->withPivot('is_sideboard');
    }

    /**
     * Get all decks this card has been played in the main deck of
     *
     * @return BelongsToMany
     */
    public function main_decks(): BelongsToMany
    {
        return $this->belongsToMany(Deck::class, 'deck_contents','oracle_id','deck_id','oracle_id','deck_id')
            ->wherePivot('is_sideboard', false);
    }

    /**
     * Get all of this cards deck_contents db entries
     *
     * @return HasMany
     */
    public function deck_contents(): HasMany
    {
        return $this->hasMany(DeckContent::class, 'oracle_id','oracle_id');
    }

    /**
     * Get the win rate of this card, for all decks it has been main decked in
     *
     * @return float|int|null
     */
    public function getWinRateAttribute(): float|int|null
    {
        return $this->main_decks
            ->avg('win_rate');
    }

    /**
     * Get the total wins for this card, when main decked
     *
     * @return int
     */
    public function getWinsAttribute(): int
    {
        return $this->getRecordValues('wins');
    }

    /**
     * Get the total losses for this card, when main decked
     *
     * @return int
     */
    public function getLossesAttribute(): int
    {
        return $this->getRecordValues('losses');
    }

    /**
     * Get the total draws for this card, when main decked
     *
     * @return int
     */
    public function getDrawsAttribute(): int
    {
        return $this->getRecordValues('draws');
    }

    /**
     * Get the total trophies for this card, when main decked
     *
     * @return int
     */
    public function getTrophiesAttribute(): int
    {
        return $this->getRecordValues('is_trophy');
    }

    /**
     * Get the top 5 other nonbasic cards that are played together with this card
     *
     * @return array
     */
    public function MostPlayedWith(): array
    {
        $array = [];
        //rewrite to check based on pivot table
         $cards = $this->main_decks()
             ->get()
             ->flatMap(function ($deck) {
                 return $deck->main_deck()
                     ->wherePivot('oracle_id','!=', $this->oracle_id)
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
     * Get the percentage of the time this card is played in the main deck
     *
     * @return float|int
     */
    public function getMainDeckRateAttribute(): float|int
    {
        $times_played = $this->decks->count();
        if ($times_played == 0)
        {
            return 0;
        }
        return round(
            100 *
            $this->main_decks->count()
            / $times_played,
        2);
    }

    /**
     * Helper function for accessing the record of the card.
     *
     * @param string $v
     * @return int
     */
    protected function getRecordValues(string $v): int
    {
        return $this->main_decks
            ->sum($v);
    }
}
