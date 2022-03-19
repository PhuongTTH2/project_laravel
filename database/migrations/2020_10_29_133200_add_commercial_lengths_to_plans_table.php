<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommercialLengthsToPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->boolean('commercial_length_90')->default(0)->after('commercial_length_60');
            $table->boolean('commercial_length_120')->default(0)->after('commercial_length_90');
            $table->boolean('commercial_length_180')->default(0)->after('commercial_length_120');
            $table->boolean('commercial_length_240')->default(0)->after('commercial_length_180');
            $table->boolean('commercial_length_300')->default(0)->after('commercial_length_240');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('commercial_length_90');
            $table->dropColumn('commercial_length_120');
            $table->dropColumn('commercial_length_180');
            $table->dropColumn('commercial_length_240');
            $table->dropColumn('commercial_length_300');
        });
    }
}
