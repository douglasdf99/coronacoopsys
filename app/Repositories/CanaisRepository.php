<?php

namespace App\Repositories;

use App\Models\Canais;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class CanaisRepository
 * @package App\Repositories
 * @version May 3, 2020, 2:51 pm -03
*/

class CanaisRepository extends BaseRepository  implements CacheableInterface {

  use CacheableRepository;
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao' =>'like'
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
        return Canais::class;
    }
}
