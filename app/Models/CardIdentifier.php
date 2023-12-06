<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CardIdentifier extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'cardIdentifiers';

    public function card (): HasOne
    {
        return $this->hasOne(Card::class, "uuid");
    }
}
