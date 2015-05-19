<?php
/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/20/15
 * Time: 7:52 PM
 */

namespace App\Blend;

use App\ExtendField\ExtendFields;
use App\Media\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Brand\Brand;


/**
 * Class Blend
 * @package App\Blend
 * @method static count()
 */
class Blend extends Model {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blends';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'avatar','description'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * RELATIONSHIP
     */
    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function extendFields() {
        return $this->hasMany(ExtendFields::class, 'id_parent', 'id');
    }

    public function medias() {
        return $this->belongsToMany(Media::class, 'blends_media', 'id', 'id')->withPivot(['ordering','lang_display']);
    }
}