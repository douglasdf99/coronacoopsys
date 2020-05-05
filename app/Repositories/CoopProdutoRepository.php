<?php

namespace App\Repositories;

use App\Models\CoopProduto;
use App\Repositories\BaseRepository;

/**
 * Class CoopProdutoRepository
 * @package App\Repositories
 * @version May 3, 2020, 4:55 pm -03
*/

class CoopProdutoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'produto_id',
        'coop_id'
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
        return CoopProduto::class;
    }
}
