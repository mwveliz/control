<?php

namespace App\Repositories;

use App\Models\Tablas;
use InfyOm\Generator\Common\BaseRepository;

class TablasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tablas::class;
    }
}
