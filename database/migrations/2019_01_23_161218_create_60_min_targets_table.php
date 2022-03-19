<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create60MinTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('60_min_targets', function (Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`60_min_targets` (
                    `id` BIGINT NOT NULL AUTO_INCREMENT,
                    `target_group_code` VARCHAR(32) NOT NULL,
                    `target_code` VARCHAR(32) NOT NULL,
                    `target_seq` INT NOT NULL,
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
        Schema::dropIfExists('60_min_targets');
    }
}
