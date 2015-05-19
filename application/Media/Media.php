<?php
/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 5/1/15
 * Time: 9:05 PM
 */

namespace App\Media;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class Media extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'media';

    protected $primaryKey = 'id_media';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['*'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * RELATIONSHIO
     */
    public function lang() {
        return $this->hasOne(MediaLang::class, 'id_media', 'id_media');
    }


    /**
     * @parent Model
     * @param $table
     * @param $table_id
     * @return mixed
     */
    static function getByParent($table, $table_id) {
        return self::leftJoin('media_lang', 'media.id_media', '=', 'media_lang.id_media')
            ->rightJoin($table .'_media', 'media.id_media', '=', $table .'_media.id_media')
            ->select('media.*', 'media_lang.*')
            ->where($table . '_media.id', '=', $table_id);
    }

    static function getByBlend($blend_id) {
        return self::getByParent('blends', $blend_id);
    }

    static function getByBrand($brand_id) {
        return self::getByParent('brands', $brand_id);
    }
}