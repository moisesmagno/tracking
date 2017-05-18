<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_influencer')->unsigned();
            $table->foreign('id_influencer')->references('id')->on('influencers');
            $table->integer('id_pixel_conversion')->unsigned();
            $table->foreign('id_pixel_conversion')->references('id')->on('pixel_conversion');
            $table->string('description', 100);
            $table->string('destiny_url');
            $table->string('short_url', 50);
            $table->string('pixel_name', 100)->default('--');
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
