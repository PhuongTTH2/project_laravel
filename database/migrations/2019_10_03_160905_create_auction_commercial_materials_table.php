<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionCommercialMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS `ass`.`auction_commercial_materials` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `auction_material_id` BIGINT NOT NULL,
          `auction_commercial_id` BIGINT NOT NULL,
          `created_at` DATETIME NOT NULL,
          `updated_at` DATETIME NOT NULL,
          `deleted_at` DATETIME NULL,
          `created_by` BIGINT NULL,
          `updated_by` BIGINT NULL,
          `deleted_by` BIGINT NULL,
          PRIMARY KEY (`id`),
          CONSTRAINT `fk_auction_commercial_materials_auction_materials_idx` FOREIGN KEY (`auction_material_id`) REFERENCES `auction_materials` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
          CONSTRAINT `fk_auction_commercial_materials_auction_commercials_idx` FOREIGN KEY (`auction_commercial_id`) REFERENCES `auction_commercials` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
        Schema::dropIfExists('auction_commercial_materials');
    }
}
