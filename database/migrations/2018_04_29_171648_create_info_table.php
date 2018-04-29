<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->increments('id');

            $table->string('link1');

            $table->string('link1_url');

            $table->string('link2');

            $table->string('link2_url');

            $table->string('link3');

            $table->string('link3_url');

            $table->string('link4');

            $table->string('link4_url');

            $table->longtext('politicas');

            $table->float('valor_usd');

            $table->float('valor_btc');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info');
    }
}
