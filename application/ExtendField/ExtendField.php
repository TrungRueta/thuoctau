<?php
namespace App\ExtendField;

use App\Brand\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExtendField extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'extend_field';

    protected $primaryKey = 'id_extend_field';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type', 'description','parent',
        'id_parent', 'ordering', 'translated', 'value', 'default_value',
        'global', 'main'
    ];
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lang() {
        return $this->hasOne(ExtendFieldLang::class, 'id_extend_field', 'id_extend_field');
    }

    public function type() {
        return $this->belongsTo(ExtendFieldType::class, 'type', 'id_extend_field_type');
    }

}