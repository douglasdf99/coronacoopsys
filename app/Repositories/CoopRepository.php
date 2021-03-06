<?php

namespace App\Repositories;

use App\Models\Coop;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;
/**
 * Class CoopRepository
 * @package App\Repositories
 * @version May 3, 2020, 11:54 am -03
*/

class CoopRepository extends BaseRepository implements CacheableInterface {

  use CacheableRepository;
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cnpj' => 'like',
        'nome' => 'like',
        'razao' => 'like',
        'email'=> 'like',
        'areas.tipo',
        'ramo.descricao',
        'coopProdutos.produto.descricao'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Coop::class;
    }
}
