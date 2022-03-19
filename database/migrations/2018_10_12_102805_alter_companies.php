<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('companies', function(Blueprint $table) {
            $table->tinyInteger('can_use_gyokyomaster')
                ->after('broadcaster_id');
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
        Schema::table('companies', function(Blueprint $table) {
            $table->dropColumn('can_use_gyokyomaster');
        });
    }
}
