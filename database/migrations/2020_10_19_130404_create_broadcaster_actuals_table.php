<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadcasterActualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = '
        CREATE TABLE IF NOT EXISTS `ass`.`broadcaster_actuals` (
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `broadcaster_id` INT NOT NULL,
            `data_type_id` INT NOT NULL,
            `period_type_id` INT NOT NULL,
            `aggregate_type_id` INT NOT NULL,
            `target_group_code` VARCHAR(32) NOT NULL,
            `target_code` VARCHAR(32) NOT NULL,
            `population_type_id` INT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL,
            `deleted_at` DATETIME NULL,
            `created_by` BIGINT NULL,
            `updated_by` BIGINT NULL,
            `deleted_by` BIGINT NULL,
            PRIMARY KEY (`id`)
          )ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
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
        Schema::dropIfExists('broadcaster_actuals');
    }
}
