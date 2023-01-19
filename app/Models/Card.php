<?php

namespace App\Models;

use App\Http\Traits\ColorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function faces()
    {
        return $this->hasMany(CardFace::class,'oracle_id','oracle_id');
    }

    public function cube_list_entry()
    {
        return $this->belongsTo(CubeList::class,'oracle_id','oracle_id');
    }

    public function rulings()
    {
        return $this->hasMany(CardRuling::class,'oracle_id','oracle_id');
    }

    public function decks()
    {
        return $this->belongsToMany(Deck::class, 'deck_contents','oracle_id','deck_id','oracle_id','deck_id')
            ->withPivot('is_sideboard');
    }

    public function main_decks()
    {
        return $this->belongsToMany(Deck::class, 'deck_contents','oracle_id','deck_id','oracle_id','deck_id')
            ->wherePivot('is_sideboard', false);
    }

    public function deck_contents()
    {
        return $this->hasMany(DeckContent::class, 'oracle_id','oracle_id');
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

    public function MostPlayedWith()
    {
        $array = [];
        //rewrite to check based on pivot table
         $cards = $this->decks()
             ->wherePivot('is_sideboard',false)
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

    public function getMainDeckRateAttribute()
    {
        if ($this->decks()->count() == 0)
        {
            return 0;
        }
        return round(
            100 *
            $this->decks()->wherePivot('is_sideboard', false)->count()
            / $this->decks()->count(),
        2);
    }

    protected function getRecordValues($v)
    {
        return $this->main_decks
            ->sum($v);
    }

    use HasFactory;
}
