<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_logs', function(Blueprint $table) {
            $sql = '
                CREATE TABLE `event_logs` (
                  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
                  `user_id` BIGINT(20) NULL,
                  `uri` TEXT NULL,
                  `event_name` TEXT NULL,
                  `params` TEXT NULL,
                  `event_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`)
                )
                ENGINE=InnoDB;
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
        Schema::dropIfExists('event_logs');
    }
}
