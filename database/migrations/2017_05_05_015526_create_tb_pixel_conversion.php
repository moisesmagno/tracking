<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPixelConversion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pixel_conversion', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_campaign')->unsigned();
            $table->foreign('id_campaign')->references('id')->on('campaigns');
            $table->integer('id_url')->unsigned();
            $table->foreign('id_url')->references('id')->on('urls');
            $table->string('name', 100);
            $table->integer('time_interval');
            $table->string('interval_type', 15);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
