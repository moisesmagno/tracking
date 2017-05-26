<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbUserAccessInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_access_information', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_user')->nullable();
            $table->integer('id_pixel')->unsigned();
            $table->foreign('id_pixel')->references('id')->on('pixel');
            $table->integer('id_influencer')->nullable();
            $table->string('referer_short_url', 80)->nullable();
            $table->string('url')->nullable();
            $table->string('agent', 25)->nullable();
            $table->string('remote_addr', 15)->nullable();
            $table->string('city', 30)->nullable();
            $table->string('region_code', 2)->nullable();
            $table->string('region_name', 50)->nullable();
            $table->string('country_code', 4)->nullable();
            $table->string('country_name', 50)->nullable();
            $table->string('time_zone', 80)->nullable();
            $table->string('latitude', 100)->nullable();
            $table->string('longitude', 100)->nullable();
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
