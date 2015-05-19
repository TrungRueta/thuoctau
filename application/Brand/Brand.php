<?php
/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/20/15
 * Time: 7:47 PM
 */

namespace App\Brand;

use App\Media\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Blend\Blend;

/**
 * Class Brand
 * @package App\Brand
 * @method static count()
 * @method Model get()
 * @method Model limit()
 */
class Brand extends Model {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'brands';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * RELATIONSHIP
     */
    public function blends() {
        return $this->hasMany(Blend::class);
    }

    public function medias() {
        return $this->belongsToMany(Media::class, 'brands_media', 'id', 'id')->withPivot(['ordering','lang_display']);
    }
}