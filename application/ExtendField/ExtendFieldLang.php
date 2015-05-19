<?php
namespace App\ExtendField;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExtendFieldLang extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'extend_field_lang';

    protected $primaryKey = 'id_extend_field';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lang','label'];

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
    public function field() {
        return $this->belongsTo(ExtendField::class, 'id_extend_field', 'id_extend_field');
    }

    public function extendFields() {
        return $this->belongsTo(ExtendFields::class, 'id_extend_field', 'id_extend_field');
    }

}