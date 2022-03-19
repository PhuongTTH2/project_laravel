<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadcasterRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('broadcaster_ratings', function (Blueprint $table) {
            $sql = "
                CREATE TABLE `broadcaster_ratings` (
                  `id` bigint(20) NOT NULL AUTO_INCREMENT,
                  `key_hash_code` text NOT NULL,
                  `data_type_id` int(11) NOT NULL,
                  `rate_type_id` int(11) NOT NULL,
                  `aggregate_type_id` int(11) NOT NULL,
                  `period_type_id` int(11) NOT NULL,
                  `vr_area_code` char(2) NOT NULL,
                  `callsign` char(4) NOT NULL,
                  `channel` char(6) NOT NULL,
                  `period_from_date` date NOT NULL,
                  `period_from_vol` int(11) NOT NULL,
                  `period_to_date` date NOT NULL,
                  `period_to_vol` int(11) NOT NULL,
                  `spot_vol` int(11) NOT NULL,
                  `target_code` varchar(32) NOT NULL,
                  `sample_num` int(11) NOT NULL,
                  `onair_date` date NOT NULL,
                  `day_of_week_id` int(11) NOT NULL,
                  `start_position` char(4) NOT NULL,
                  `end_position` char(4) NOT NULL,
                  `pt_sb_code` char(2) NOT NULL,
                  `rate` double NOT NULL,
                  `int_rate` int(11) NOT NULL DEFAULT '0',
                  `release_time` datetime NOT NULL,
                  `created_at` datetime NOT NULL,
                  `created_by` bigint(20) DEFAULT NULL,
                  `updated_at` datetime NOT NULL,
                  `updated_by` bigint(20) DEFAULT NULL,
                  `deleted_at` datetime DEFAULT NULL,
                  `deleted_by` bigint(20) DEFAULT NULL,
                  PRIMARY KEY (`id`),
                  KEY `index_broadcaster_ratings_001` (`key_hash_code`(255),`data_type_id`,`rate_type_id`,`aggregate_type_id`,`target_code`,`period_from_date`,`period_to_date`),
                  KEY `index_broadcaster_ratings_002` (`data_type_id`,`aggregate_type_id`,`target_code`,`period_type_id`,`period_from_date`,`period_to_date`)
                ) ENGINE=InnoDB";
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('broadcaster_ratings');
    }
}
