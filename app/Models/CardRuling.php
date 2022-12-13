<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardRuling extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ruling_id';
    protected $guarded = [];

    protected $table = 'card_rulings';

    use HasFactory;

    public function card()
    {
        return $this->belongsTo(Card::class,'oracle_id','oracle_id');
    }
}
