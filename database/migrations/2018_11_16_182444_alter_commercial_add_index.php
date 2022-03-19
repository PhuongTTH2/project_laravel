<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCommercialAddIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = 'ALTER TABLE commercials ADD INDEX index_commercials_001(`key_hash_code`(255))';
        DB::connection()->getPdo()->exec($sql);

        $sql = 'ALTER TABLE commercials ADD INDEX index_commercials_002(`area_code`,`callsign`,`pt_sb_code`,`onair_date`,`sales_start_time`,`sales_end_time`)';
        DB::connection()->getPdo()->exec($sql);

        $sql = 'ALTER TABLE commercials ADD INDEX index_commercials_003(`position`)';
        DB::connection()->getPdo()->exec($sql);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = 'ALTER TABLE commercials DROP INDEX index_commercials_001';
        DB::connection()->getPdo()->exec($sql);

        $sql = 'ALTER TABLE commercials DROP INDEX index_commercials_002';
        DB::connection()->getPdo()->exec($sql);

        $sql = 'ALTER TABLE commercials DROP INDEX index_commercials_003';
        DB::connection()->getPdo()->exec($sql);
    }
}
