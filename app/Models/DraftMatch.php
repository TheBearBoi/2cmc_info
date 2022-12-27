<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftMatch extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'draft_match_id';
    protected $table = 'draft_matches';

    protected $fillable = ['draft_id', 'round_number', 'seat_1_id', 'seat_2_id', 'player_1_wins', 'player_2_wins', 'draws', 'is_submitted'];

    public function draft()
    {
        return $this->belongsTo(Draft::class, 'draft_id', 'draft_id');
    }

    public function seat_1()
    {
        return $this->belongsTo(DraftSeat::class, 'seat_1_id', 'seat_id');
    }

    public function seat_2()
    {
        return $this->belongsTo(DraftSeat::class, 'seat_2_id', 'seat_id');
    }

    use HasFactory;
}
