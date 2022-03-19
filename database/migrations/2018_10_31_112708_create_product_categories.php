<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('product_categories', function (Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`product_categories` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `business_category_code` CHAR(2) NOT NULL,
                  `product_category_code` CHAR(5) NOT NULL,
                  `product_category_name` VARCHAR(32) NOT NULL,
                  `product_category_kana` VARCHAR(32) NULL,
                  `created_at` DATETIME NOT NULL,
                  `updated_at` DATETIME NOT NULL,
                  `deleted_at` DATETIME NULL,
                  `created_by` BIGINT NULL,
                  `updated_by` BIGINT NULL,
                  `deleted_by` BIGINT NULL,
                  PRIMARY KEY (`id`))
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
        //
        Schema::dropIfExists('product_categories');
    }
}
