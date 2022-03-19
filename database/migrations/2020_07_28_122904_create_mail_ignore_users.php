<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailIgnoreUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS `mail_ignore_users` (
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `user_id` BIGINT NOT NULL,
            `mail_class` VARCHAR(64) NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL,
            `deleted_at` DATETIME NULL,
            `created_by` BIGINT NULL,
            `updated_by` BIGINT NULL,
            `deleted_by` BIGINT NULL,
            PRIMARY KEY (`id`),
            CONSTRAINT `fk_mail_ignore_users_users_idx` FOREIGN KEY (`user_id`) REFERENCES `ass`.`users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
        )ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
        ";
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_ignore_users');
    }
}
