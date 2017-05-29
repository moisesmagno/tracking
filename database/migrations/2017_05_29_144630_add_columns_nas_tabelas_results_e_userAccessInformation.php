<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsNasTabelasResultsEUserAccessInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('results', function(Blueprint $table)
        {
            $table->string('id_agent')->nullable()->after('remote_addr');
        });

        Schema::table('user_access_information', function(Blueprint $table)
        {
            $table->string('id_agent')->nullable()->after('longitude');
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
