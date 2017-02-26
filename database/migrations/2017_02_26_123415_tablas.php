<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Tablas.
 *
 * @author  The scaffold-interface created at 2017-02-26 12:34:15am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Tablas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('tablas',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('orden');
        
        $table->date('fecha');
        
        $table->String('mac');
        
        /**
         * Foreignkeys section
         */
        
        
        $table->timestamps();
        
        
        $table->softDeletes();
        
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
        Schema::drop('tablas');
    }
}
