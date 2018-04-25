<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Billeteras.
 *
 * @author  The scaffold-interface created at 2018-04-19 08:24:47pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Billeteras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('billeteras',function (Blueprint $table){

        $table->increments('id');
        
        $table->biginteger('user_id');
        
        $table->float('disponible');
        
        $table->String('estado');
        
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
        Schema::drop('billeteras');
    }
}
