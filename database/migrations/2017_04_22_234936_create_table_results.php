<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_influencer')->unsigned();
            $table->foreign('id_influencer')->references('id')->on('influencers');
            $table->string('referer');
            $table->string('agent', 25);
            $table->string('remote_addr', 15);
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
