<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_periods', function (Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`target_periods` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `commercial_year_month` CHAR(6) NOT NULL,
                  `vr_area_code` CHAR(2) NOT NULL,
                  `broadcaster_code` INT NOT NULL,
                  `data_type_id` INT NOT NULL,
                  `period_type_id` INT NOT NULL,
                  `aggregate_type_id` INT NOT NULL,
                  `period_from_date` DATE NOT NULL,
                  `period_from_vol` INT NOT NULL,
                  `period_to_date` DATE NOT NULL,
                  `period_to_vol` INT NOT NULL,
                  `spot_vol` INT NULL,
                  `created_at` DATETIME NOT NULL,
                  `updated_at` DATETIME NOT NULL,
                  `deleted_at` DATETIME NULL,
                  `created_by` BIGINT NULL,
                  `updated_by` BIGINT NULL,
                  `deleted_by` BIGINT NULL,
                  PRIMARY KEY (`id`))
                ENGINE = InnoDB
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
        Schema::dropIfExists('target_periods');
    }
}
