<?php
/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 5/1/15
 * Time: 9:05 PM
 */

namespace App\Media;


use Illuminate\Database\Eloquent\Model;

class MediaLang extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'media_lang';

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
     * RELATIONSHIP
     */
    public function medias() {
        return $this->belongsTo(Media::class, 'id_media', 'id_media');
    }
}