<?php

namespace App\Repositories;

use App\Models\comando;
use InfyOm\Generator\Common\BaseRepository;

class comandoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'orden',
        'fecha',
        'mac'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return comando::class;
    }
}
