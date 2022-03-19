<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('targets', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`targets` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `target_code` VARCHAR(32) NOT NULL,
                  `target_name` VARCHAR(32) NOT NULL,
                  `pattern01` TINYINT(1) NOT NULL,
                  `pattern02` TINYINT(1) NOT NULL,
                  `pattern03` TINYINT(1) NOT NULL,
                  `pattern04` TINYINT(1) NOT NULL,
                  `pattern05` TINYINT(1) NOT NULL,
                  `pattern06` TINYINT(1) NOT NULL,
                  `pattern07` TINYINT(1) NOT NULL,
                  `pattern08` TINYINT(1) NOT NULL,
                  `pattern09` TINYINT(1) NOT NULL,
                  `pattern10` TINYINT(1) NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  UNIQUE INDEX `target_code_UNIQUE` (`target_code` ASC))
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
        Schema::dropIfExists('targets');
    }
}
