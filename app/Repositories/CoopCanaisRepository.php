<?php

namespace App\Repositories;

use App\Models\CoopCanais;
use App\Repositories\BaseRepository;

/**
 * Class CoopCanaisRepository
 * @package App\Repositories
 * @version May 5, 2020, 12:06 am -03
*/

class CoopCanaisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'canai_id',
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
        return CoopCanais::class;
    }
}
