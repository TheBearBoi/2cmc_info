<?php

namespace App\Models;

use App\Http\Traits\ColorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Model for the Card Object
 *
 * @package App\Models
 * @property int|null $id
 * @property string|null $artist
 * @property string|null $artistIds
 * @property string|null $asciiName
 * @property string|null $attractionLights
 * @property string|null $availability
 * @property string|null $boosterTypes
 * @property string|null $borderColor
 * @property string|null $cardParts
 * @property string|null $colorIdentity
 * @property string|null $colorIndicator
 * @property string|null $colors
 * @property string|null $defense
 * @property string|null $duelDeck
 * @property int|null $edhrecRank
 * @property float|null $edhrecSaltiness
 * @property float|null $faceConvertedManaCost
 * @property string|null $faceFlavorName
 * @property float|null $faceManaValue
 * @property string|null $faceName
 * @property string|null $finishes
 * @property string|null $flavorName
 * @property string|null $flavorText
 * @property string|null $frameEffects
 * @property string|null $frameVersion
 * @property string|null $hand
 * @property int|null $hasAlternativeDeckLimit
 * @property int|null $hasContentWarning
 * @property int|null $hasFoil
 * @property int|null $hasNonFoil
 * @property int|null $isAlternative
 * @property int|null $isFullArt
 * @property int|null $isFunny
 * @property int|null $isOnlineOnly
 * @property int|null $isOversized
 * @property int|null $isPromo
 * @property int|null $isRebalanced
 * @property int|null $isReprint
 * @property int|null $isReserved
 * @property int|null $isStarter
 * @property int|null $isStorySpotlight
 * @property int|null $isTextless
 * @property int|null $isTimeshifted
 * @property string|null $keywords
 * @property string|null $language
 * @property string|null $layout
 * @property string|null $leadershipSkills
 * @property string|null $life
 * @property string|null $loyalty
 * @property string|null $manaCost
 * @property float|null $manaValue
 * @property string|null $name
 * @property string|null $number
 * @property string|null $originalPrintings
 * @property string|null $originalReleaseDate
 * @property string|null $originalText
 * @property string|null $originalType
 * @property string|null $otherFaceIds
 * @property string|null $power
 * @property string|null $printings
 * @property string|null $promoTypes
 * @property string|null $rarity
 * @property string|null $rebalancedPrintings
 * @property string|null $relatedCards
 * @property string|null $securityStamp
 * @property string|null $setCode
 * @property string|null $side
 * @property string|null $signature
 * @property string|null $sourceProducts
 * @property string|null $subsets
 * @property string|null $subtypes
 * @property string|null $supertypes
 * @property string|null $text
 * @property string|null $toughness
 * @property string|null $type
 * @property string|null $types
 * @property string|null $uuid
 * @property string|null $variations
 * @property string|null $watermark
 * @property-read \App\Models\CubeList|null $cube_list_entry
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DeckContent[] $deck_contents
 * @property-read int|null $deck_contents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Deck[] $decks
 * @property-read int|null $decks_count
 * @property-read string $color
 * @property-read int $draws
 * @property-read mixed $is_basic
 * @property-read int $losses
 * @property-read float|int $main_deck_rate
 * @property-read int $trophies
 * @property-read float|int|null $win_rate
 * @property-read int $wins
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Deck[] $main_decks
 * @property-read int|null $main_decks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CardRuling[] $rulings
 * @property-read int|null $rulings_count
 * @method static \Illuminate\Database\Eloquent\Builder|Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Card query()
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereArtist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereArtistIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereAsciiName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereAttractionLights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereAvailability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereBoosterTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereBorderColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereCardParts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereColorIdentity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereColorIndicator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereDefense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereDuelDeck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereEdhrecRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereEdhrecSaltiness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereFaceConvertedManaCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereFaceFlavorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereFaceManaValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereFaceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereFinishes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereFlavorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereFlavorText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereFrameEffects($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereFrameVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereHand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereHasAlternativeDeckLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereHasContentWarning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereHasFoil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereHasNonFoil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsAlternative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsFullArt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsFunny($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsOnlineOnly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsOversized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsPromo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsRebalanced($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsReprint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsReserved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsStarter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsStorySpotlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsTextless($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsTimeshifted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereLeadershipSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereLife($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereLoyalty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereManaCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereManaValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereOriginalPrintings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereOriginalReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereOriginalText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereOriginalType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereOtherFaceIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card wherePrintings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card wherePromoTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereRarity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereRebalancedPrintings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereRelatedCards($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereSecurityStamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereSetCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereSourceProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereSubsets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereSubtypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereSupertypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereToughness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereVariations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereWatermark($value)
 * @mixin \Eloquent
 */
class Card extends Model
{
    use ColorTrait;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'uuid';
    protected $guarded = [];

    protected $with = ['cardIdentifier'];

    protected $table = 'cards';

    /**
     * Get all the card faces for the card
     *
     * @return HasMany
     */
    public function otherFaces(): HasMany
    {
        return $this->hasMany(Card::class,'otherFaceIds','uuid');
    }

    public function cardIdentifier (): HasOne
    {
        return $this->hasOne(CardIdentifier::class, "uuid");
    }

    /**
     * If the card is in the cube, get its cube list entry
     *
     * @return BelongsTo
     */
    public function cube_list_entry(): BelongsTo
    {
        return $this->belongsTo(CubeList::class,'uuid','uuid');
    }

    /**
     * Get all rulings for the card
     *
     * @return HasMany
     */
    public function rulings(): HasMany
    {
        return $this->hasMany(CardRuling::class,'uuid','uuid');
    }

    /**
     * Get all decks this card has been played in
     *
     * @return BelongsToMany
     */
    public function decks(): BelongsToMany
    {
        return $this->belongsToMany(Deck::class, 'deck_contents','uuid','deck_id','uuid','deck_id')
            ->withPivot('is_sideboard');
    }

    /**
     * Get all decks this card has been played in the main deck of
     *
     * @return BelongsToMany
     */
    public function main_decks(): BelongsToMany
    {
        return $this->belongsToMany(Deck::class, 'deck_contents','uuid','deck_id','uuid','deck_id')
            ->wherePivot('is_sideboard', false);
    }

    /**
     * Get all of this cards deck_contents db entries
     *
     * @return HasMany
     */
    public function deck_contents(): HasMany
    {
        return $this->hasMany(DeckContent::class, 'uuid','uuid');
    }

    public function getSideAttribute($value): string
    {
        return match ($value) {
            "a" => "front",
            "b" => "back",
            default => "front",
        };
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
                     ->wherePivot('uuid','!=', "$this->uuid'")
                     ->where('supertypes', 'not like', "%Basic%")
                     ->get();
             })
             ->countBy('uuid')
             ->sortDesc()
             ->take(5);
        foreach ($cards as $uuid => $count)
        {
            $array[] = ['card' => Card::find($uuid),
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

    protected function getPngUriAttribute(): string
    {
        $scryfallId = $this->cardIdentifier->scryfallId;
        return "https://cards.scryfall.io/png/$this->side/$scryfallId[0]/$scryfallId[1]/$scryfallId.png";
    }

    public function getIsBasicAttribute(): bool
    {
        return $this->checkIfBasic();
    }

    private function checkIfBasic(): bool
    {
        return str_contains($this->superTypes,"Basic");
    }


}
