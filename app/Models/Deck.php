<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\ColorTrait;

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

    public function main_deck()
    {
        return $this->belongsToMany(Card::class, 'deck_contents','deck_id','oracle_id')
            ->where('is_sideboard',false)
            ->withPivot('quantity');
    }

    public function sideboard()
    {
        return $this->belongsToMany(Card::class, 'deck_contents','deck_id','oracle_id')
            ->where('is_sideboard',true)
            ->withPivot('quantity');
    }

    public function player()
    {
        return $this->belongsTo(Player::class,'player_id', 'player_id');
    }

    public function draft_seat()
    {
        return $this->hasOne(DraftSeat::class);
    }

    public function draft()
    {
        return $this->hasOneThrough(Draft::class,DraftSeat::class,);
    }

    use HasFactory;
}
