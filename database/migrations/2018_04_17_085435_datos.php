<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Datos.
 *
 * @author  The scaffold-interface created at 2018-04-17 08:54:36pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Datos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('datos',function (Blueprint $table){

        $table->increments('id');
        
        $table->bigInteger('user_id');
        
        $table->longText('biografia');
        
        $table->String('nacimiento_ano');
        
        $table->String('sexo');
        
        $table->String('localidad');
        
        $table->String('interes');
        
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
        Schema::drop('datos');
    }
}
