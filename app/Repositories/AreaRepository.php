<?php

namespace App\Repositories;

use App\Models\Area;
use App\Repositories\BaseRepository;

/**
 * Class AreaRepository
 * @package App\Repositories
 * @version May 5, 2020, 12:29 am -03
*/

class AreaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo',
        'endereco_padrao',
        'endereco',
        'cidade',
        'estado',
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
        return Area::class;
    }
}
