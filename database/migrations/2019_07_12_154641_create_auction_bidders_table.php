<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionBiddersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = '
        CREATE TABLE IF NOT EXISTS `ass`.`auction_bidders` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `auction_commercial_id` BIGINT NOT NULL,
          `user_id` BIGINT NOT NULL,
          `sponsor_id` BIGINT NOT NULL, -- 広告主ID
          `sponsor_name` VARCHAR(64) NOT NULL, -- 広告主名(広告主名変更された時の為に、名称で残しておく)
          `business_category` VARCHAR(64) NOT NULL, -- 業種
          `sponsor_product_category` VARCHAR(64) NOT NULL, -- 商品カテゴリ
          `sponsor_product` VARCHAR(64) NOT NULL,  -- 商品名
          `edi_number` VARCHAR(20) NULL,
          `business_review_id` INT NOT NULL,
          `material_review_id` INT NOT NULL,
          `material_code_01` VARCHAR(11) NULL,
          `material_code_02` VARCHAR(11) NULL,
          `material_code_03` VARCHAR(11) NULL,
          `material_code_04` VARCHAR(11) NULL,
          `material_code_05` VARCHAR(11) NULL,
          `price` INT NOT NULL,
          `is_approval` SMALLINT(1) DEFAULT 0, -- (0:否認, 1:承認)
          `note` TEXT NULL, -- 承認時の備考
          `created_at` DATETIME NOT NULL,
          `updated_at` DATETIME NOT NULL,
          `deleted_at` DATETIME NULL,
          `created_by` BIGINT NULL,
          `updated_by` BIGINT NULL,
          `deleted_by` BIGINT NULL,
          PRIMARY KEY (`id`),
          CONSTRAINT `fk_auction_bidders_auction_commercials_idx` FOREIGN KEY (`auction_commercial_id`) REFERENCES `auction_commercials` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
          CONSTRAINT `fk_auction_bidders_users_idx` FOREIGN KEY (`user_id`) REFERENCES `ass`.`users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
        Schema::dropIfExists('auction_bidders');
    }
}
