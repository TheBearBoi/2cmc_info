<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|Card[] $otherFace
 * @property-read int|null $other_face_count
 */
	class Card extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CardIdentifier
 *
 * @property int|null $id
 * @property string|null $cardKingdomEtchedId
 * @property string|null $cardKingdomFoilId
 * @property string|null $cardKingdomId
 * @property string|null $cardsphereId
 * @property string|null $mcmId
 * @property string|null $mcmMetaId
 * @property string|null $mtgArenaId
 * @property string|null $mtgjsonFoilVersionId
 * @property string|null $mtgjsonNonFoilVersionId
 * @property string|null $mtgjsonV4Id
 * @property string|null $mtgoFoilId
 * @property string|null $mtgoId
 * @property string|null $multiverseId
 * @property string|null $scryfallId
 * @property string|null $scryfallIllustrationId
 * @property string|null $scryfallOracleId
 * @property string|null $tcgplayerEtchedProductId
 * @property string|null $tcgplayerProductId
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier query()
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereCardKingdomEtchedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereCardKingdomFoilId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereCardKingdomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereCardsphereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereMcmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereMcmMetaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereMtgArenaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereMtgjsonFoilVersionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereMtgjsonNonFoilVersionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereMtgjsonV4Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereMtgoFoilId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereMtgoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereMultiverseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereScryfallId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereScryfallIllustrationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereScryfallOracleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereTcgplayerEtchedProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereTcgplayerProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardIdentifier whereUuid($value)
 */
	class CardIdentifier extends \Eloquent {}
}

namespace App\Models{
/**
 * Model for the Card Rulings Object
 *
 * @package App\Models
 * @property int|null $id
 * @property string|null $date
 * @property string|null $text
 * @property string|null $uuid
 * @property-read \App\Models\Card|null $card
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling query()
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereUuid($value)
 * @mixin \Eloquent
 */
	class CardRuling extends \Eloquent {}
}

namespace App\Models{
/**
 * Model for the Cube List Entry Object
 *
 * @package App\Models
 * @property int $sleeve_uid Data Should be accessed as Hex
 * @property int|null $layout_key_1
 * @property int|null $layout_key_2
 * @property string|null $uuid
 * @property-read \App\Models\Card|null $card
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList query()
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereLayoutKey1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereLayoutKey2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereSleeveUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereUuid($value)
 * @mixin \Eloquent
 */
	class CubeList extends \Eloquent {}
}

namespace App\Models{
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
	class Deck extends \Eloquent {}
}

namespace App\Models{
/**
 * Model for the Deck Contents Entry Object
 *
 * @package App\Models
 * @property int $deck_content_id
 * @property int $deck_id
 * @property int $quantity
 * @property int $is_sideboard
 * @property string|null $uuid
 * @property-read \App\Models\Card|null $card
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereDeckContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereDeckId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereIsSideboard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereUuid($value)
 * @mixin \Eloquent
 */
	class DeckContent extends \Eloquent {}
}

namespace App\Models{
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
	class Draft extends \Eloquent {}
}

namespace App\Models{
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
	class DraftMatch extends \Eloquent {}
}

namespace App\Models{
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
	class DraftSeat extends \Eloquent {}
}

namespace App\Models{
/**
 * Model for the Player Object
 *
 * @package App\Models
 * @property int $player_id
 * @property string $player_name
 * @property string|null $pronouns
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Deck[] $decks
 * @property-read int|null $decks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DraftSeat[] $draft_seats
 * @property-read int|null $draft_seats_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Draft[] $drafts
 * @property-read int|null $drafts_count
 * @property-read int $draws
 * @property-read int $losses
 * @property-read int $trophies
 * @property-read float|int|null $win_rate
 * @property-read int $wins
 * @method static \Illuminate\Database\Eloquent\Builder|Player newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Player newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Player query()
 * @method static \Illuminate\Database\Eloquent\Builder|Player wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player wherePlayerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player wherePronouns($value)
 * @mixin \Eloquent
 */
	class Player extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Task
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @mixin \Eloquent
 */
	class Task extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

