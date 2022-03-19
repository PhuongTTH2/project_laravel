<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = '
        CREATE TABLE IF NOT EXISTS `ass`.`auction_materials` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `auction_id` BIGINT NOT NULL,
          `link_title` VARCHAR(128) NOT NULL,
          `link_contents` VARCHAR(64) NOT NULL,
          `file_name_origin` VARCHAR(128) NOT NULL,
          `created_at` DATETIME NOT NULL,
          `updated_at` DATETIME NOT NULL,
          `deleted_at` DATETIME NULL,
          `created_by` BIGINT NULL,
          `updated_by` BIGINT NULL,
          `deleted_by` BIGINT NULL,
          PRIMARY KEY (`id`),
          CONSTRAINT `fk_auction_materials_auction_idx` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
        )ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
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
        Schema::dropIfExists('auction_materials');
    }
}
