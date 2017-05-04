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
            $table->integer('id_campaign');
            $table->string('url');
            $table->string('agent', 25);
            $table->string('remote_addr', 15);
            $table->string('city', 30);
            $table->string('region_code', 2);
            $table->string('region_name', 50);
            $table->string('country_code', 4);
            $table->string('country_name', 50);
            $table->string('time_zone', 80);
            $table->string('latitude', 100);
            $table->string('longitude', 100);
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
