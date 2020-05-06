<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CoopProduto
 * @package App\Models
 * @version May 3, 2020, 4:55 pm -03
 *
 * @property \App\Models\Coop $coop
 * @property \App\Models\Produto $produto
 * @property integer $produto_id
 * @property integer $coop_id
 */
class CoopProduto extends Model
{
    use SoftDeletes;

    public $table = 'coop_produtos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'produto_id',
        'coop_id',
        'descricao',
        'produtotable',
        'categoriatable',
        'empresa',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'produto_id' => 'integer',
        'coop_id' => 'integer',
        'descricao'=> 'string',
        'produtotable'=> 'string',
        'categoriatable'=> 'string',
        'empresa'=> 'string',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function produto()
    {
        return $this->belongsTo(\App\Models\Produto::class, 'produto_id');
    }
}
