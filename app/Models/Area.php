<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Area
 * @package App\Models
 * @version May 5, 2020, 12:29 am -03
 *
 * @property \App\Models\Coop $coop
 * @property string $tipo
 * @property integer $endereco_padrao
 * @property string $endereco
 * @property string $cidade
 * @property string $estado
 * @property integer $coop_id
 */
class Area extends Model
{
    use SoftDeletes;

    public $table = 'areas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'tipo',
        'endereco_padrao',
        'endereco',
        'cidade',
        'estado',
        'coop_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo' => 'string',
        'coop_id' => 'integer'
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
    public function coop()
    {
        return $this->belongsTo(\App\Models\Coop::class, 'coop_id');
    }
}
