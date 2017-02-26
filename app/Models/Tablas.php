<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Tablas
 * @package App\Models
 * @version February 26, 2017, 12:38 am UTC
 */
class Tablas extends Model
{

    public $table = 'tablas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
