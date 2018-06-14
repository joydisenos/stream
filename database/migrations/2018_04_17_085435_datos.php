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

        $table->String('foto_perfil');
        
        $table->String('sexo');
        
        $table->String('interes');

        $table->integer('afiliado')->default(0)->nullable();
        
        $table->integer('natural')->default(0)->nullable();

        $table->integer('fitness')->default(0)->nullable();

        $table->integer('grandespechos')->default(0)->nullable();

        $table->integer('trasero')->default(0)->nullable();

        $table->String('localidad');

        $table->String('edad');

        $table->String('provincia');

        $table->String('telefono');

        $table->float('precio_cam_sesion')->default(0);

        $table->float('precio_cam_hora')->default(0);

        $table->integer('citas')->default(0);

        $table->float('precio_cita_hora')->default(0);

        $table->float('precio_cita_dia')->default(0);

        $table->longText('detalles_cita');

        
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
