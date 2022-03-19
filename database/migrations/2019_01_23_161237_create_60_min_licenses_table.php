<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create60MinLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('60_min_licenses', function (Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`60_min_licenses` (
                    `id` BIGINT NOT NULL AUTO_INCREMENT,
                    `license_id` BIGINT NOT NULL,
                    `broadcaster_id` BIGINT NOT NULL,
                    `created_at` DATETIME NOT NULL,
                    `updated_at` DATETIME NOT NULL,
                    `deleted_at` DATETIME NULL,
                    `created_by` BIGINT NULL,
                    `updated_by` BIGINT NULL,
                    `deleted_by` BIGINT NULL,
                    PRIMARY KEY (`id`),
                    INDEX `fk_60_min_licenses_licenses1_idx` (`license_id` ASC),
                    CONSTRAINT `fk_60_min_licenses_licenses1`
                    FOREIGN KEY (`license_id`)
                    REFERENCES `ass`.`licenses` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
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
        Schema::dropIfExists('60_min_licenses');
    }
}
