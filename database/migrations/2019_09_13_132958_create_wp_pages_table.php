<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWpPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS `ass`.`wp_pages` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `tag` varchar(64) UNIQUE NOT NULL,
          `url` varchar(255) NOT NULL,
          `note` text DEFAULT NULL,
          `created_at` DATETIME NOT NULL,
          `updated_at` DATETIME NOT NULL,
          `deleted_at` DATETIME NULL,
          `created_by` BIGINT NULL,
          `updated_by` BIGINT NULL,
          `deleted_by` BIGINT NULL,
          PRIMARY KEY (`id`)
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
        Schema::dropIfExists('wp_pages');
    }
}
