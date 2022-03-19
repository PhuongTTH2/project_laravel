<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart_commercials', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`cart_commercials` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `cart_id` BIGINT NOT NULL,
                  `commercial_id` BIGINT NOT NULL,
                  `program_title` TEXT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  INDEX `fk_cart_commercials_carts1_idx` (`cart_id` ASC),
                  PRIMARY KEY (`id`),
                  INDEX `fk_cart_commercials_commercials1_idx` (`commercial_id` ASC),
                  CONSTRAINT `fk_cart_commercials_carts1`
                    FOREIGN KEY (`cart_id`)
                    REFERENCES `ass`.`carts` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION,
                  CONSTRAINT `fk_cart_commercials_commercials1`
                    FOREIGN KEY (`commercial_id`)
                    REFERENCES `ass`.`commercials` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
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
        Schema::dropIfExists('cart_commercials');
    }
}
