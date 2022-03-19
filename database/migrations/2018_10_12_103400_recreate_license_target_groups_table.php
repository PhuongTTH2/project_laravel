<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateLicenseTargetGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('license_target_groups');
        Schema::table('license_target_groups', function(Blueprint $table) {
            $sql = '
            CREATE TABLE IF NOT EXISTS `ass`.`license_target_groups` (
              `id` BIGINT NOT NULL AUTO_INCREMENT,
              `data_license_detail_id` BIGINT NOT NULL,
              `target_group_id` BIGINT NOT NULL,
              `created_at` DATETIME NOT NULL,
              `updated_at` DATETIME NOT NULL,
              `deleted_at` DATETIME NULL,
              `created_by` BIGINT NULL,
              `updated_by` BIGINT NULL,
              `deleted_by` BIGINT NULL,
              PRIMARY KEY (`id`),
              INDEX `fk_license_target_groups_data_licenses_detail1_idx` (`data_license_detail_id` ASC),
              CONSTRAINT `fk_license_target_groups_data_licenses_detail1`
                FOREIGN KEY (`data_license_detail_id`)
                REFERENCES `ass`.`data_license_details` (`id`)
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
        Schema::dropIfExists('license_target_groups');
    }
}
