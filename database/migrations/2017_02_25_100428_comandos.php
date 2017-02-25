<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Comandos.
 *
 * @author  The scaffold-interface created at 2017-02-25 10:04:28pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Comandos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('comandos',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('orden');
        
        $table->date('fecha');
        
        $table->String('mac');
        
        /**
         * Foreignkeys section
         */
        
        
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('comandos');
    }
}
