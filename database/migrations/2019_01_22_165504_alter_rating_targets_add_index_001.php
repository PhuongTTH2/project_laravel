<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRatingTargetsAddIndex001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec('ALTER TABLE `rating_targets` ADD INDEX index_rating_targets_001(`data_type_id`, `vr_area_code`, `year` ,`month` ,`callsign`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('ALTER TABLE `rating_targets` DROP INDEX index_rating_targets_001');
    }
}
