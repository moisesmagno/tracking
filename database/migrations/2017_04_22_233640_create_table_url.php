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
            $table->integer('id_campaign')->unsigned();
            $table->foreign('id_campaign')->references('id')->on('campaigns');
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
