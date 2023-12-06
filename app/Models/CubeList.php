<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model for the Cube List Entry Object
 *
 * @package App\Models
 * @property int $sleeve_uid Data Should be accessed as Hex
 * @property int|null $layout_key_1
 * @property int|null $layout_key_2
 * @property string|null $uuid
 * @property-read \App\Models\Card|null $card
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList query()
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereLayoutKey1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereLayoutKey2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereSleeveUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CubeList whereUuid($value)
 * @mixin \Eloquent
 */
class CubeList extends Model
{
    protected $guarded = [];
    protected $table = 'cube_list';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'sleeve_uid';

    protected $with = ['card', 'card.cardIdentifier'];

    /**
     * Get the Card object this Cube List Entry belongs to
     *
     * @return BelongsTo
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class,'uuid','uuid');
    }
}
