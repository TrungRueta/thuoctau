<?php
namespace App\ExtendField;

use App\Blend\Blend;
use App\Brand\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExtendFields extends Model {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'extend_fields';

    protected $primaryKey = 'id_extend_fields';

    public $timestamps = false;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $guaded = [
        'created_at', 'modified_at'
    ];

    /**
     * RELATIONSHIP
     */
    public function blend() {
        return $this->belongsTo(Blend::class, 'id_parent', 'id');
    }

    public function field() {
        return $this->hasOne(ExtendField::class, 'id_extend_field', 'id_extend_field');
    }

    public function language() {
        return $this->hasOne(ExtendFieldLang::class, 'id_extend_field', 'id_extend_field');
    }


    /**
     * @class Model
     * @param $table
     * @param $id
     * @return mixed
     */
    static function getByParent($table, $id) {
        return self::leftJoin('extend_field', 'extend_fields.id_extend_field', '=', 'extend_field.id_extend_field')
            ->leftJoin('extend_field_lang', 'extend_fields.id_extend_field', '=', 'extend_field_lang.id_extend_field')
            ->leftJoin('extend_field_type', 'extend_field.type', '=', 'extend_field_type.id_extend_field_type')
            ->where('extend_fields.parent','=',$table)
            ->where('extend_fields.id_parent', '=', $id);
    }

    static function getByBlend($id) {
        return self::getByParent('blends', $id);
    }
}