<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenericCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('generic_codes', function (Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`generic_codes` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `category` VARCHAR(32) NOT NULL,
                  `code` INT NOT NULL,
                  `name` VARCHAR(32) NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `updated_at` DATETIME NOT NULL,
                  `deleted_at` DATETIME NULL,
                  `created_by` BIGINT NULL,
                  `updated_by` BIGINT NULL,
                  `deleted_by` BIGINT NULL,
                  PRIMARY KEY (`id`))
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
        Schema::dropIfExists('generic_codes');
    }
}
