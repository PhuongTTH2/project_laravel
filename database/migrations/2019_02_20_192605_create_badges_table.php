<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('badges', function(Blueprint $table) {
            $sql = "
            CREATE TABLE IF NOT EXISTS `ass`.`badges` (
                `id` BIGINT NOT NULL AUTO_INCREMENT,
                `company_id` BIGINT NOT NULL,
                `user_id` BIGINT NULL,
                `type_badge` SMALLINT NOT NULL,
                `created_at` DATETIME NOT NULL,
                `updated_at` DATETIME NOT NULL,
                `deleted_at` DATETIME NULL,
                `created_by` BIGINT NULL,
                `updated_by` BIGINT NULL,
                `deleted_by` BIGINT NULL,
                PRIMARY KEY (`id`),
                  INDEX `fk_badges_users1_idx` (`user_id` ASC),
                  CONSTRAINT `fk_badges_users1`
                    FOREIGN KEY (`user_id`)
                    REFERENCES `ass`.`users` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION,
                  INDEX `fk_badges_companies1_idx` (`company_id` ASC),
                  CONSTRAINT `fk_badges_companies1`
                    FOREIGN KEY (`company_id`)
                    REFERENCES `ass`.`companies` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION
            )ENGINE = InnoDB;
            ";
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
        Schema::dropIfExists('badges');
    }
}
