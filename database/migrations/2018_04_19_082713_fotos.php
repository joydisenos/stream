<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Fotos.
 *
 * @author  The scaffold-interface created at 2018-04-19 08:27:13pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Fotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('fotos',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('url');
        
        $table->String('tags');
        
        $table->biginteger('user_id');
        
        $table->String('titulo');

        $table->integer('publico')->default(1);
        
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
        Schema::drop('fotos');
    }
}
