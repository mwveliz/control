<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tabla.
 *
 * @author  The scaffold-interface created at 2017-02-26 12:34:15am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Tabla extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'tablas';

	
}
