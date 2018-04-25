<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Movimientos.
 *
 * @author  The scaffold-interface created at 2018-04-17 08:58:37pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Movimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('movimientos',function (Blueprint $table){

        $table->increments('id');
        
        $table->biginteger('user_id');
        
        $table->float('cantidad');
        
        $table->integer('estado');
        
        $table->String('transaccion');
        
        $table->longText('numero_trans');
        
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
        Schema::drop('movimientos');
    }
}
