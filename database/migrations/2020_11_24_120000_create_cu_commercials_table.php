<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cu_commercials', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`cu_commercials` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `area_code` CHAR(7) NOT NULL,
                  `broadcaster_id` BIGINT NOT NULL,
                  `callsign` CHAR(4) NOT NULL,
                  `onair_date` DATE NULL,
                  `day_of_week_id` INT NULL,
                  `sales_start_time` DATETIME NOT NULL,
                  `sales_end_time` DATETIME NOT NULL,
                  `term_delay` SMALLINT(2) NOT NULL,
                  `distribute_start_time` DATETIME NOT NULL,
                  `distribute_end_time` DATETIME NOT NULL,
                  `minimum_distribute_term` SMALLINT(1) NOT NULL,
                  `start_time` CHAR(4) NULL,
                  `end_time` CHAR(4) NULL,
                  `cancel_limit_day` SMALLINT(3) NOT NULL,
                  `program_title` VARCHAR(64) NOT NULL,
                  `code_cu_type_target` VARCHAR(64) NOT NULL,
                  `code_cu_type_data_source` VARCHAR(64) NOT NULL,
                  `is_option_device` TINYINT(1) NOT NULL,
                  `is_option_os` TINYINT(1) NOT NULL,
                  `is_option_clickable` TINYINT(1) NOT NULL,
                  `imp_default` DOUBLE(9,1) NOT NULL,
                  `imp_min` DOUBLE(9,1) NOT NULL,
                  `imp_max` DOUBLE(9,1) NOT NULL,
                  `imp_stock` DOUBLE(9,1) NOT NULL,
                  `price_plan` DOUBLE(9,1) NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  KEY `fk_cu_commercials_broadcasters1_idx` (`broadcaster_id`),
                  CONSTRAINT `fk_cu_commercials_broadcasters1` FOREIGN KEY (`broadcaster_id`) REFERENCES `broadcasters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
                  ) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
            ';
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
        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('cu_commercials');
        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=1;');
    }
}
