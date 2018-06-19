<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Filtro_usuarios.
 *
 * @author  The scaffold-interface created at 2018-06-15 08:31:02pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class FiltroUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('filtro_usuarios',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('user_id');
        
        $table->integer('filtro_id');

        $table->integer('estatus')->default(0);
        
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
        Schema::drop('filtro_usuarios');
    }
}
