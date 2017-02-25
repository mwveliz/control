<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comando.
 *
 * @author  The scaffold-interface created at 2017-02-25 10:04:28pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Comando extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'comandos';

	
}
