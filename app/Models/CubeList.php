<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model for the Cube List Entry Object
 *
 * @package App\Models
 */
class CubeList extends Model
{
    protected $guarded = [];
    protected $table = 'cube_list';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'sleeve_id';

    protected $with = ['card'];

    /**
     * Get the Card object this Cube List Entry belongs to
     *
     * @return BelongsTo
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class,'oracle_id','oracle_id');
    }
}
