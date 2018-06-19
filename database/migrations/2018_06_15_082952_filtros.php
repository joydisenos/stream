<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Filtros.
 *
 * @author  The scaffold-interface created at 2018-06-15 08:29:53pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Filtros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('filtros',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('nombre');
        
        $table->integer('estatus');
        
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
        Schema::drop('filtros');
    }
}
