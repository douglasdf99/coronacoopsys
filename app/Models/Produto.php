<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produto
 * @package App\Models
 * @version May 3, 2020, 11:01 am -03
 *
 * @property \Illuminate\Database\Eloquent\Collection $coopProdutos
 * @property string $descricao
 */
class Produto extends Model
{
    use SoftDeletes;

    public $table = 'produtos';
    
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
        'descricao' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function coopProdutos()
    {
        return $this->hasMany(\App\Models\CoopProduto::class, 'produto_id');
    }
}
