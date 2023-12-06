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
 * @property int $deck_id
 * @property string $deck_name
 * @property int $player_id
 * @property string $color
 * @property string $archetype
 * @property int $wins
 * @property int $losses
 * @property int $draws
 * @property int $is_trophy
 * @property float|null $win_rate
 * @property-read \App\Models\Draft|null $draft
 * @property-read \App\Models\DraftSeat|null $draft_seat
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Card[] $main_deck
 * @property-read int|null $main_deck_count
 * @property-read \App\Models\Player|null $player
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Card[] $sideboard
 * @property-read int|null $sideboard_count
 * @method static \Illuminate\Database\Eloquent\Builder|Deck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deck query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereArchetype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereDeckId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereDeckName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereDraws($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereIsTrophy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereLosses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereWinRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereWins($value)
 * @mixin \Eloquent
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
        return $this->belongsToMany(Card::class, 'deck_contents','deck_id','uuid')
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
        return $this->belongsToMany(Card::class, 'deck_contents','deck_id','uuid')
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
