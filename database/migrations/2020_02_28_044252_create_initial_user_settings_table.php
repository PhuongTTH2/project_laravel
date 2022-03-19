<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = '
            CREATE TABLE IF NOT EXISTS `ass`.`initial_user_settings` (
              `id` bigint(20) NOT NULL AUTO_INCREMENT,
              `user_id` bigint(20) DEFAULT NULL,
              `area_id` BIGINT DEFAULT NULL,
              `broadcast_id` VARCHAR(128) DEFAULT NULL,
              `data_type_id` int(11) DEFAULT NULL,
              `rate_type_id` int(11) DEFAULT NULL,
              `target_group_id` bigint(20) DEFAULT NULL,
              `created_at` datetime NOT NULL,
              `updated_at` datetime NOT NULL,
              `deleted_at` datetime DEFAULT NULL,
              `created_by` bigint(20) DEFAULT NULL,
              `updated_by` bigint(20) DEFAULT NULL,
              `deleted_by` bigint(20) DEFAULT NULL,
              PRIMARY KEY (`id`),
              CONSTRAINT `fk_initial_user_settings_users_idx` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ';
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('initial_user_settings');
    }
}
