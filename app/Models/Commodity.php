<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Commodity
 *
 * @property int $id
 * @property string $title
 * @property int $goods_id
 * @property float $price
 * @property int $status
 * @property string $details
 * @property int $num
 * @property int $create_time
 * @property int $update_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Goods $goods
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereUpdateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Commodity extends Model
{
    //
    protected $fillable=["title","goods_id","price","status","details","num","img"];

    public function goods(){

        return $this->belongsTo(Goods::class,"goods_id");
    }
}
