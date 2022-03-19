<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuCommercialOsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cu_commercial_os', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`cu_commercial_os` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `cu_commercial_id` BIGINT NOT NULL,
                  `code` VARCHAR(64) NOT NULL,
                  `is_default` TINYINT(1) NOT NULL,
                  `coefficient` DOUBLE(6,2) NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_cu_commercial_os_cu_commercials1_idx` (`cu_commercial_id` ASC),
                  CONSTRAINT `fk_cu_commercial_os_commercials1`
                    FOREIGN KEY (`cu_commercial_id`)
                    REFERENCES `ass`.`cu_commercials` (`id`)
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
        Schema::dropIfExists('cu_commercial_os');
    }
}
