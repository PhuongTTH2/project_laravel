<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS `ass`.`auction_commercials` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `auction_id` BIGINT NOT NULL,
          `year` char(4) NOT NULL,
          `month` char(2) NOT NULL,
          `channel` char(6) NOT NULL,
          `onair_date` date NOT NULL,
          `day_of_week_id` int(11) NOT NULL,
          `position` char(4) NOT NULL,
          `pt_sb_code` char(2) NOT NULL,
          `start_position` char(4) NOT NULL,
          `end_position` char(4) DEFAULT NULL,
          `length` smallint(6) NOT NULL DEFAULT '15',
          `program_title` varchar(128) DEFAULT NULL,
          `count` smallint(6) NOT NULL, -- 表示枠数
          `count_stock` smallint(6) NOT NULL, -- 実際の枠数
          `start_datetime` DATETIME NOT NULL, -- オークション開始日時
          `end_datetime` DATETIME NOT NULL, -- オークション終了日時
          `price_start` INT DEFAULT NULL, -- 開始価格
          `price_closing_lowest` INT DEFAULT NULL, -- 最低落札価格(最低落札価格×枠数＝予定落札価格)
          `price_bid_lowest` INT DEFAULT NULL, -- 入札開始金額
          `is_finish` SMALLINT(1) NOT NULL DEFAULT 0, -- オークション終了フラグ(バッチで使用。これを見ないと何度も終了メール送ることになるので)
          `is_fixed` SMALLINT(1) NOT NULL DEFAULT 0, -- 承認処理完了フラグ
          `created_at` DATETIME NOT NULL,
          `updated_at` DATETIME NOT NULL,
          `deleted_at` DATETIME NULL,
          `created_by` BIGINT NULL,
          `updated_by` BIGINT NULL,
          `deleted_by` BIGINT NULL,
          PRIMARY KEY (`id`),
          CONSTRAINT `fk_auction_commercials_auctions_idx` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
        Schema::dropIfExists('auction_commercials');
    }
}
