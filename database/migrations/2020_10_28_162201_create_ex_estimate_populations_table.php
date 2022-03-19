<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExEstimatePopulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = '
        CREATE TABLE `ex_estimate_populations` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `vr_area_code` char(2) NOT NULL,
            `broadcaster_code` int(11) NOT NULL,
            `period_from_date` date NOT NULL,
            `period_to_date` date NOT NULL,
            `target_code` varchar(32) NOT NULL,
            `population` int(11) NOT NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime NOT NULL,
            `deleted_at` datetime DEFAULT NULL,
            `created_by` bigint(20) DEFAULT NULL,
            `updated_by` bigint(20) DEFAULT NULL,
            `deleted_by` bigint(20) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `index_ex_estimate_populations_001` (`target_code`)
          ) ENGINE=InnoDB AUTO_INCREMENT=5721 DEFAULT CHARSET=utf8mb4
        ';
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ex_estimate_populations');
    }
}
