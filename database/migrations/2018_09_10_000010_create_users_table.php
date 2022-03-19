<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`users` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `company_id` BIGINT NOT NULL,
                  `account` VARCHAR(64) NOT NULL,
                  `password` VARCHAR(64) NOT NULL,
                  `role_id` INT NOT NULL,
                  `user_name` VARCHAR(32) NULL,
                  `tel` VARCHAR(13) NULL,
                  `email` VARCHAR(128) NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
                  INDEX `fk_users_companies1_idx` (`company_id` ASC),
                  UNIQUE INDEX `account_UNIQUE` (`account` ASC),
                  CONSTRAINT `fk_users_companies1`
                    FOREIGN KEY (`company_id`)
                    REFERENCES `ass`.`companies` (`id`)
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
        Schema::dropIfExists('users');
    }
}
