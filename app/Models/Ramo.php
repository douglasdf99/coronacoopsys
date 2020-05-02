<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ramo
 * @package App\Models
 * @version May 1, 2020, 11:09 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $coops
 * @property string $descricao
 */
class Ramo extends Model
{
    use SoftDeletes;

    public $table = 'ramos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'descricao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descricao' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function coops()
    {
        return $this->hasMany(\App\Models\Coop::class, 'ramo_id');
    }
}
