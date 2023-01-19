<?php

namespace App\Models;

use App\Http\Traits\ColorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardFace extends Model
{
    use ColorTrait;

    public $timestamps = false;
    protected $primaryKey = 'face_id';
    protected $guarded = [];

    protected $table = 'card_faces';

    use HasFactory;

    public function card()
    {
        return $this->belongsTo(Card::class,'oracle_id','oracle_id');
    }

    public function getHtmlManaCostAttribute()
    {
        return preg_replace('/({.+?})/','$1',$this->mana_cost);
    }
}
