<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateDataLicenseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('data_license_details');
        Schema::table('data_license_details', function(Blueprint $table) {
            $sql = '
            CREATE TABLE IF NOT EXISTS `ass`.`data_license_details` (
              `id` BIGINT NOT NULL AUTO_INCREMENT,
              `data_license_id` BIGINT NOT NULL,
              `area_id` BIGINT NOT NULL,
              `data_type_id` INT NOT NULL,
              `rate_type_id` INT NOT NULL,
              `period_from_date` DATE NOT NULL,
              `period_to_date` DATE NOT NULL,
              `created_at` DATETIME NOT NULL,
              `updated_at` DATETIME NOT NULL,
              `deleted_at` DATETIME NULL,
              `created_by` BIGINT NULL,
              `updated_by` BIGINT NULL,
              `deleted_by` BIGINT NULL,
              PRIMARY KEY (`id`),
              INDEX `fk_data_license_details_data_licenses1_idx` (`data_license_id` ASC),
              CONSTRAINT `fk_data_license_details_data_licenses1`
                FOREIGN KEY (`data_license_id`)
                REFERENCES `ass`.`data_licenses` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB;
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
        //
        Schema::dropIfExists('data_license_details');
    }
}
