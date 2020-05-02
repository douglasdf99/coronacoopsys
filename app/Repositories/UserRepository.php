<?php

namespace App\Repositories;

use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version May 1, 2020, 6:33 pm UTC
*/

class UserRepository extends BaseRepository  implements CacheableInterface {

  use CacheableRepository;

    /*
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'email' => 'like'
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
        return User::class;
    }
}
