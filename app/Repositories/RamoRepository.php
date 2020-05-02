<?php

namespace App\Repositories;

use App\Models\Ramo;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class RamoRepository
 * @package App\Repositories
 * @version May 1, 2020, 11:09 pm UTC
*/

class RamoRepository extends BaseRepository implements CacheableInterface {

  use CacheableRepository;
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao'=> 'like'
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
        return Ramo::class;
    }
}
