<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CubeList extends Model
{
    protected $guarded = [];
    protected $table = 'cube_list';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'sleeve_id';

    protected $with = ['card'];

    public function card()
    {
        return $this->belongsTo(Card::class,'oracle_id','oracle_id');
    }

    use HasFactory;
}
