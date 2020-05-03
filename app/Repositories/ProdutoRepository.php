<?php

namespace App\Repositories;

use App\Models\Produto;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class ProdutoRepository
 * @package App\Repositories
 * @version May 3, 2020, 11:01 am -03
*/

class ProdutoRepository extends BaseRepository implements CacheableInterface {

  use CacheableRepository;
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao' => 'like'
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
        return Produto::class;
    }
}
