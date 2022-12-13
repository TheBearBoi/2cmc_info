<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'draft_id';

    protected $table = 'drafts';

    protected $with = ['seats', 'players', 'decks'];

    protected $fillable = ['phase', 'is_team_draft', 'round_time', 'round_end_time'];

    //tie to matches and seats directly, decks and players indirectly
    public function seats()
    {
        return $this->hasMany(DraftSeat::class, 'draft_id', 'draft_id');
    }

    public function matches()
    {
        return $this->hasMany(DraftMatch::class, 'draft_id', 'draft_id');
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'draft_seats', 'player_id', 'draft_id', 'draft_id', 'player_id');
    }

    public function decks()
    {
        return $this->belongsToMany(Deck::class,'draft_seats',  'deck_id', 'draft_id', 'draft_id', 'deck_id');
    }

    use HasFactory;
}
