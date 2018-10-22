<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Classify
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $article
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classify whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classify whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classify whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classify whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Classify extends Model
{
    //
    protected $fillable=["name"];

    public function article(){
        return $this->hasMany(Article::class,"classify_id");
    }
}
