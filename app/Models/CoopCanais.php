<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CoopCanais
 * @package App\Models
 * @version May 5, 2020, 12:06 am -03
 *
 * @property \App\Models\Canai $canai
 * @property \App\Models\Coop $coop
 * @property integer $canai_id
 * @property integer $coop_id
 */
class CoopCanais extends Model
{
    use SoftDeletes;

    public $table = 'coop_canais';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'canai_id',
        'coop_id',
        'descricao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'canai_id' => 'integer',
        'coop_id' => 'integer',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function canai()
    {
        return $this->belongsTo(\App\Models\Canais::class, 'canai_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function coop()
    {
        return $this->belongsTo(\App\Models\Coop::class, 'coop_id');
    }
}
