<?php
//
//namespace App\Models;
//
//use App\Http\Traits\ColorTrait;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;
//
///**
// * Model for the Card Face Object
// *
// * @package App\Models
// */
//class CardFace extends Model
//{
//    use ColorTrait;
//
//    public $timestamps = false;
//    protected $primaryKey = 'face_id';
//    protected $guarded = [];
//
//    protected $table = 'card_faces';
//
//    /**
//     * Get the Card object this face belongs to
//     *
//     * @return BelongsTo
//     */
//    public function card(): BelongsTo
//    {
//        return $this->belongsTo(Card::class,'oracle_id','oracle_id');
//    }
//
//    /**
//     * Format the mana cost attribute such that it can be used more easily in html.
//     *
//     * @return string
//     */
//    public function getHtmlManaCostAttribute(): string
//    {
//        return preg_replace('/({.+?})/','$1',$this->mana_cost);
//    }
//}
