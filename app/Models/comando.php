<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class comando
 * @package App\Models
 * @version February 25, 2017, 11:32 pm UTC
 */
class comando extends Model
{

    public $table = 'comandos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'orden',
        'fecha',
        'mac'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'orden' => 'string',
        'fecha' => 'date',
        'mac' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
