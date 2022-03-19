<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssPlus extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ASS+CM枠判別フラグ
        Schema::table('commercials', function (Blueprint $table) {
            if (!Schema::hasColumn('commercials', 'code_ass_plus')) {
                $table
                    ->string('code_ass_plus', 8)
                    ->after('length')
                    ->nullable()
                ;
            }
        });

        // ASS+カート判別フラグ
        Schema::table('carts', function (Blueprint $table) {
            if (!Schema::hasColumn('carts', 'kind')) {
                $table->tinyInteger('kind')
                    ->default(\App\Models\Eloquent\Cart::KIND_GENERAL)
                    ->after('password');
            }
        });

        // ASS+価格パターン
        $sql = "
        CREATE TABLE IF NOT EXISTS `ass`.`ass_plus_discount_patterns` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `broadcaster_id` BIGINT DEFAULT NULL,
          `pattern_code` VARCHAR(8) NOT NULL,
          `date` SMALLINT UNSIGNED DEFAULT NULL,
          `rate` SMALLINT UNSIGNED NOT NULL,
          `created_at` DATETIME NOT NULL,
          `updated_at` DATETIME NOT NULL,
          `deleted_at` DATETIME NULL,
          `created_by` BIGINT NULL,
          `updated_by` BIGINT NULL,
          `deleted_by` BIGINT NULL,
          PRIMARY KEY (`id`),
          CONSTRAINT `fk_ap_price_pattern_broadcasters_broadcasters1`
            FOREIGN KEY (`broadcaster_id`)
            REFERENCES `ass`.`broadcasters` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
        )ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
        ";
        DB::connection()->getPdo()->exec($sql);

        // コンフィグマスタ
        $sql = "
        CREATE TABLE IF NOT EXISTS `ass`.`configs` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `code` VARCHAR(64) NOT NULL,
          `value` VARCHAR(128) NOT NULL,
          `discription` TEXT DEFAULT NULL,
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


        DB::connection()->getPdo()->exec("
        INSERT INTO `configs` (`code`, `value`, `discription`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
            ('ass_plus_change_rate_time', '00:00', '直前枠カート内CM有効時刻', now(), now(), -1, -1)
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // ASS+CM枠判別フラグ
        Schema::table('commercials', function (Blueprint $table) {
            if (Schema::hasColumn('commercials', 'code_ass_plus')) {
                $table->dropColumn('code_ass_plus');
            }
        });

        // ASS+カート判別フラグ
        Schema::table('carts', function (Blueprint $table) {
            if (Schema::hasColumn('carts', 'kind')) {
                $table->dropColumn('kind');
            }
        });

        // ASS+価格パターン
        Schema::dropIfExists('ass_plus_discount_patterns');

        // コンフィグマスタ
        Schema::dropIfExists('configs');
    }
}
