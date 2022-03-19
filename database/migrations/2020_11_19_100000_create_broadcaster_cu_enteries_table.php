<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadcasterCuEnteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('broadcaster_cu_enteries', function (Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`broadcaster_cu_enteries` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `broadcaster_id` BIGINT NOT NULL,
                  `minimum_price` INT(10) NOT NULL,
                  `calc` TEXT NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `updated_at` DATETIME NOT NULL,
                  `deleted_at` DATETIME NULL,
                  `created_by` BIGINT NULL,
                  `updated_by` BIGINT NULL,
                  `deleted_by` BIGINT NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_broadcaster_cu_enteries_broadcasters_idx` (`broadcaster_id` ASC),
                  CONSTRAINT `fk_broadcaster_cu_enteries_broadcasters`
                    FOREIGN KEY (`broadcaster_id`)
                    REFERENCES `ass`.`broadcasters` (`id`)
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
        Schema::dropIfExists('broadcaster_cu_enteries');
    }
}
