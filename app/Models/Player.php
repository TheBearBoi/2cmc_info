<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'player_id';

    protected $fillable = ['player_name'];

    protected $table = 'players';

    use HasFactory;

    public function decks()
    {
        return $this->hasMany(Deck::class, 'player_id', 'player_id');
    }

    public function draft_seats()
    {
        return $this->hasMany(DraftSeat::class);
    }

    public function drafts()
    {
        return $this->belongsToMany(Draft::class, 'draft_seats');
    }

    public function getWinRateAttribute()
    {
        return $this->decks
            ->avg('win_rate');
    }

    public function getWinsAttribute()
    {
        return $this->getRecordValues('wins');
    }

    public function getLossesAttribute()
    {
        return $this->getRecordValues('losses');
    }

    public function getDrawsAttribute()
    {
        return $this->getRecordValues('draws');
    }

    public function getTrophiesAttribute()
    {
        return $this->getRecordValues('is_trophy');
    }

    protected function getRecordValues($v)
    {
        return $this->decks
            ->sum($v);
    }

    public function MostPlayedWith()
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


}
