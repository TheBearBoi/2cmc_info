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
 * App\Models\Card
 *
 * @property string $oracle_id
 * @property string $name
 * @property string $layout
 * @property float $cmc
 * @property int $is_basic
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DeckContent[] $deck_contents
 * @property-read int|null $deck_contents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Deck[] $decks
 * @property-read int|null $decks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CardFace[] $faces
 * @property-read int|null $faces_count
 * @property-read mixed $color
 * @property-read mixed $draws
 * @property-read mixed $losses
 * @property-read mixed $main_deck_rate
 * @property-read mixed $trophies
 * @property-read mixed $win_rate
 * @property-read mixed $wins
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Deck[] $main_decks
 * @property-read int|null $main_decks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CardRuling[] $rulings
 * @property-read int|null $rulings_count
 * @method static \Database\Factories\CardFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Card query()
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereCmc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereIsBasic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereOracleId($value)
 */
	class Card extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CardFace
 *
 * @property int $face_id
 * @property string $oracle_id
 * @property int $face_number
 * @property string $name
 * @property string $mana_cost
 * @property string $type_line
 * @property string $oracle_text
 * @property string|null $power
 * @property string|null $toughness
 * @property string $small_image_uri
 * @property string $normal_image_uri
 * @property string $large_image_uri
 * @property string $png_uri
 * @property string $art_crop_uri
 * @property string $border_crop_uri
 * @property mixed|null $color
 * @property-read \App\Models\Card|null $card
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace query()
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereArtCropUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereBorderCropUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereFaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereFaceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereLargeImageUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereManaCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereNormalImageUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereOracleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereOracleText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace wherePngUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereSmallImageUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereToughness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardFace whereTypeLine($value)
 */
	class CardFace extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CardRuling
 *
 * @property string $oracle_id
 * @property int $ruling_id
 * @property string $ruling_date
 * @property string $ruling_text
 * @property-read \App\Models\Card|null $card
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling query()
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereOracleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereRulingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereRulingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardRuling whereRulingText($value)
 */
	class CardRuling extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CubeList
 *
 * @property int $sleeve_id
 * @property string $oracle_id
 * @property int|null $layout_key_1
 * @property int|null $layout_key_2
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList query()
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereLayoutKey1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereLayoutKey2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereOracleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereSleeveId($value)
 */
	class CubeList extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Deck
 *
 * @property int $deck_id
 * @property string $deck_name
 * @property int $player_id
 * @property string $color
 * @property string $archetype
 * @property int $wins
 * @property int $losses
 * @property int $draws
 * @property int $is_trophy
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
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereWins($value)
 */
	class Deck extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeckContent
 *
 * @property int $deck_content_id
 * @property int $deck_id
 * @property string $oracle_id
 * @property int $quantity
 * @property int $is_sideboard
 * @property-read \App\Models\Card|null $card
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereDeckContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereDeckId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereIsSideboard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereOracleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeckContent whereQuantity($value)
 */
	class DeckContent extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Draft
 *
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
 */
	class Draft extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DraftMatch
 *
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
 */
	class DraftMatch extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DraftSeat
 *
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
 */
	class DraftSeat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Player
 *
 * @property int $player_id
 * @property string $player_name
 * @property string|null $pronouns
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Deck[] $decks
 * @property-read int|null $decks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DraftSeat[] $draft_seats
 * @property-read int|null $draft_seats_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Draft[] $drafts
 * @property-read int|null $drafts_count
 * @property-read mixed $draws
 * @property-read mixed $losses
 * @property-read mixed $trophies
 * @property-read mixed $win_rate
 * @property-read mixed $wins
 * @method static \Illuminate\Database\Eloquent\Builder|Player newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Player newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Player query()
 * @method static \Illuminate\Database\Eloquent\Builder|Player wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player wherePlayerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player wherePronouns($value)
 */
	class Player extends \Eloquent {}
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
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

