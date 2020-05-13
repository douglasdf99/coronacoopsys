<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Coop
 * @package App\Models
 * @version May 3, 2020, 11:54 am -03
 *
 * @property \App\Models\Ramo $ramo
 * @property \Illuminate\Database\Eloquent\Collection $areas
 * @property \Illuminate\Database\Eloquent\Collection $contatos
 * @property \Illuminate\Database\Eloquent\Collection $coopProdutos
 * @property string $cnpj
 * @property string $razao
 * @property string $matriz
 * @property string $site
 * @property string $email
 * @property string $logo
 * @property string $telefone
 * @property string $whatsapp
 * @property string $estado
 * @property string $cidade
 * @property string $numero
 * @property string $complemento
 * @property string $bairro
 * @property integer $compartilhamento
 * @property integer $sell
 * @property integer $ramo_id
 * @property string $catalogo
 * @property integer $ativo
 */
class Coop extends Model
{
    use SoftDeletes;

    public $table = 'coop';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'cnpj',
        'razao',
        'nome',
        'matriz',
        'site',
        'email',
        'logo',
        'telefone',
        'whatsapp',
        'cep',
        'estado',
        'cidade',
        'numero',
        'complemento',
        'bairro',
        'compartilhamento',
        'sell',
        'ramo_id',
        'catalogo',
        'ativo',
        'contato_nome',
        'contato_telefone',
        'contato_email',
        'contato_cargo',
        'ajuda',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cnpj' => 'string',
        'razao' => 'string',
        'nome' => 'string',
        'matriz' => 'string',
        'site' => 'string',
        'email' => 'string',
        'logo' => 'string',
        'telefone' => 'string',
        'whatsapp' => 'string',
        'cep' => 'string',
        'estado' => 'string',
        'cidade' => 'string',
        'numero' => 'string',
        'complemento' => 'string',
        'bairro' => 'string',
        'compartilhamento' => 'integer',
        'sell' => 'integer',
        'ramo_id' => 'integer',
        'catalogo' => 'string',
        'ativo' => 'integer',
      'contato_nome' => 'string',
      'contato_telefone' => 'string',
      'contato_email' => 'string',
      'contato_cargo' => 'string',
      'ajuda' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'cnpj' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ramo()
    {
        return $this->belongsTo(\App\Models\Ramo::class, 'ramo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function areas()
    {
        return $this->hasMany(\App\Models\Area::class, 'coop_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contatos()
    {
        return $this->hasMany(\App\Models\Contato::class, 'coop_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function coopProdutos()
    {
        return $this->hasMany(\App\Models\CoopProduto::class, 'coop_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function coopCanais()
    {
        return $this->hasMany(\App\Models\CoopCanais::class, 'coop_id');
    }
}
