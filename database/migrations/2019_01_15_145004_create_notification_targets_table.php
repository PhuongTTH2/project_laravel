<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notification_targets', function (Blueprint $table) {
            $sql = '
            CREATE TABLE IF NOT EXISTS `ass`.`notification_targets` (
                `id` BIGINT NOT NULL AUTO_INCREMENT,
                `notification_id` BIGINT NOT NULL,
                `company_id` BIGINT NOT NULL,
                `created_at` DATETIME NOT NULL,
                `updated_at` DATETIME NOT NULL,
                `deleted_at` DATETIME NULL,
                `created_by` BIGINT NULL,
                `updated_by` BIGINT NULL,
                `deleted_by` BIGINT NULL,
                PRIMARY KEY (`id`),
                INDEX `fk_notification_targets_notifications1_idx` (`notification_id` ASC),
                CONSTRAINT `fk_notification_targets_notifications1`
                  FOREIGN KEY (`notification_id`)
                  REFERENCES `ass`.`notifications` (`id`)
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
        Schema::dropIfExists('notification_targets');
    }
}
