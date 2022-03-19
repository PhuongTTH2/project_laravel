<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFutureProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('future_programs', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`future_programs` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `media_id` INT NOT NULL,
                  `callsign` CHAR(4) NOT NULL,
                  `year` CHAR(4) NOT NULL,
                  `month` CHAR(2) NOT NULL,
                  `created_date` DATE NOT NULL,
                  `day_of_week_id` INT NOT NULL,
                  `start_time` CHAR(4) NOT NULL,
                  `frame_id` INT NOT NULL,
                  `program_type_id` INT NOT NULL,
                  `duration` INT NOT NULL,
                  `main_title` TEXT NULL,
                  `program_code` TEXT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`))
                COLLATE=`utf8mb4_unicode_ci`
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
        Schema::dropIfExists('future_programs');
    }
}
