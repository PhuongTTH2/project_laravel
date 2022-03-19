<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_links', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`target_links` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `data_type_id` INT NOT NULL,
                  `area_code` CHAR(7) NOT NULL,
                  `target_group_code` VARCHAR(32) NOT NULL,
                  `target_code` VARCHAR(32) NOT NULL,
                  `target_seq` INT NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`))
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
        Schema::dropIfExists('target_links');
    }
}
