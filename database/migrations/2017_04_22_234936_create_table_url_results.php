<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUrlResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_results', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_url')->unsigned();
            $table->foreign('id_url')->references('id')->on('urls');
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
