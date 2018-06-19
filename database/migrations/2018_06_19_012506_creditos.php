<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Creditos.
 *
 * @author  The scaffold-interface created at 2018-06-19 01:25:07pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Creditos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('creditos',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('nombre');
        
        $table->float('cantidad');
        
        $table->float('valor');
        
        $table->String('descripcion');
        
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
        Schema::drop('creditos');
    }
}
