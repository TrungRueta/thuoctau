<?php
namespace App\ExtendField;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExtendFieldType extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'extend_field_type';

    protected $primaryKey = 'id_extend_field_type';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = ['type_name','values', ''];

    protected $guarded = ['validate', 'id_extend_field_type', 'default_values',
        'created_at', 'modified_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * RELATIONSHIP
     */
    public function extendField() {
        return $this->hasMany(ExtendField::class, 'type', 'id_extend_field');
    }

}