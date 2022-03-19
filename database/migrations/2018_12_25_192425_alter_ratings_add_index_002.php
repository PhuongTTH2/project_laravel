<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRatingsAddIndex002 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec('ALTER TABLE ratings DROP INDEX index_ratings_002');
        DB::connection()->getPdo()->exec('ALTER TABLE ratings DROP INDEX index_ratings_003');
        DB::connection()->getPdo()->exec('ALTER TABLE ratings DROP INDEX index_ratings_004');

        DB::connection()->getPdo()->exec('ALTER TABLE ratings ADD INDEX index_ratings_002(`data_type_id`,`aggregate_type_id`,`target_code`,`period_type_id`, period_from_date, period_to_date)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('ALTER TABLE ratings DROP INDEX index_ratings_002');
        DB::connection()->getPdo()->exec('ALTER TABLE ratings DROP INDEX index_ratings_003');
        DB::connection()->getPdo()->exec('ALTER TABLE ratings DROP INDEX index_ratings_004');

        DB::connection()->getPdo()->exec('ALTER TABLE ratings ADD INDEX index_ratings_002(`key_hash_code`(255),`data_type_id`,`aggregate_type_id`, `target_code`, `period_type_id`)');
        DB::connection()->getPdo()->exec('ALTER TABLE ratings ADD INDEX index_ratings_003(`period_from_date`,`period_from_vol`,`period_to_date`,`period_to_vol`)');
        DB::connection()->getPdo()->exec('ALTER TABLE ratings ADD INDEX index_ratings_004(`data_type_id`,`aggregate_type_id`,`target_code`,`period_type_id`)');
    }
}
