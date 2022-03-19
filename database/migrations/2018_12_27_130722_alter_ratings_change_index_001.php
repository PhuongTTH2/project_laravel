<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRatingsChangeIndex001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec('ALTER TABLE ratings DROP INDEX index_ratings_001');
        DB::connection()->getPdo()->exec('ALTER TABLE ratings ADD INDEX index_ratings_001(`key_hash_code`(255),`data_type_id`,`rate_type_id`,`aggregate_type_id`, `target_code`, `period_from_date`, `period_to_date`)');
        DB::connection()->getPdo()->exec('ALTER TABLE ratings ADD INDEX index_ratings_003 (`data_type_id`, `aggregate_type_id`, `callsign`, `onair_date`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('ALTER TABLE ratings DROP INDEX index_ratings_001');
        DB::connection()->getPdo()->exec('ALTER TABLE ratings ADD INDEX index_ratings_001(`key_hash_code`(255))');
        DB::connection()->getPdo()->exec('ALTER TABLE ratings DROP INDEX index_ratings_003');
    }
}
