<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $sql = "
            CREATE TABLE IF NOT EXISTS `ass`.`notifications` (
                `id` BIGINT NOT NULL AUTO_INCREMENT,
                `title` VARCHAR(64) NOT NULL,
                `start_time` DATETIME NOT NULL,
                `end_time` DATETIME NOT NULL,
                `notification_types` SET('login', 'popup_after_login') NOT NULL,
                `for_all_company` TINYINT(1) NOT NULL,
                `message` TEXT NOT NULL,
                `created_at` DATETIME NOT NULL,
                `updated_at` DATETIME NOT NULL,
                `deleted_at` DATETIME NULL,
                `created_by` BIGINT NULL,
                `updated_by` BIGINT NULL,
                `deleted_by` BIGINT NULL,
                PRIMARY KEY (`id`))
              ENGINE = InnoDB;
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
        Schema::dropIfExists('notifications');
    }
}
