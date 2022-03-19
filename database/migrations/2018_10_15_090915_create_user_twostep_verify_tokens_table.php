<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTwostepVerifyTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_twostep_verify_tokens', function (Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`user_twostep_verify_tokens` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `user_id` BIGINT NOT NULL,
                  `token` VARCHAR(64) NOT NULL,
                  `expire` DATETIME NOT NULL,
                  `passcode` VARCHAR(64) NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_user_twostep_verify_tokens1_idx` (`user_id` ASC),
                  CONSTRAINT `fk_user_twostep_verify_tokens1`
                    FOREIGN KEY (`user_id`)
                    REFERENCES `ass`.`users` (`id`)
                    ON DELETE CASCADE
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
        Schema::dropIfExists('user_twostep_verify_tokens');
    }
}
