<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftSeat extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'seat_id';
    protected $table = 'draft_seats';

    protected $fillable = ['seat_number', 'draft_id', 'player_id', 'deck_id', 'team_number'];

    public function draft()
    {
        return $this->belongsTo(Draft::class, 'draft_id', 'draft_id');
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id', 'player_id');
    }

    public function deck()
    {
        return $this->belongsTo(Deck::class, 'deck_id', 'deck_id');
    }

    use HasFactory;
}
