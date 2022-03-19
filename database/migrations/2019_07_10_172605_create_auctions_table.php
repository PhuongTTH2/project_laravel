<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS `ass`.`auctions` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `area_code` char(7) NOT NULL,
          `callsign` char(4) NOT NULL,
          `code` varchar(128) NOT NULL,
          `auction_title` varchar(128) DEFAULT NULL,
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
        Schema::dropIfExists('auctions');
    }
}