<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DeckContent extends Pivot
{
    public $timestamps = false;
    protected $primaryKey = 'deck_content_id';

    protected $table = 'deck_contents';

    public function card()
    {
        return $this->belongsTo(Card::class,'oracle_id','oracle_id');
    }

    use HasFactory;
}
