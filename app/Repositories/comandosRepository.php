<?php

namespace App\Repositories;

use App\Models\Comandos;
use InfyOm\Generator\Common\BaseRepository;

class ComandosRepository extends BaseRepository
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
        return Comandos::class;
    }
}
