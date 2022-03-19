<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`bookings` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `user_id` BIGINT NOT NULL,
                  `cart_id` BIGINT NOT NULL,
                  `dest_broadcaster_id` BIGINT NOT NULL,
                  `application_date` DATE NOT NULL,
                  `sponsor_name` VARCHAR(64) NOT NULL,
                  `sponsor_product_category` VARCHAR(64) NOT NULL,
                  `sponsor_product` VARCHAR(64) NOT NULL,
                  `company_name` VARCHAR(32) NOT NULL,
                  `company_site_name` VARCHAR(64) NOT NULL,
                  `user_name` VARCHAR(32) NOT NULL,
                  `tel` VARCHAR(13) NOT NULL,
                  `email` VARCHAR(128) NOT NULL,
                  `edi_number` VARCHAR(20) NULL,
                  `business_review_id` INT NOT NULL,
                  `material_review_id` INT NOT NULL,
                  `material_code_01` VARCHAR(10) NULL,
                  `material_code_02` VARCHAR(10) NULL,
                  `material_code_03` VARCHAR(10) NULL,
                  `material_code_04` VARCHAR(10) NULL,
                  `material_code_05` VARCHAR(10) NULL,
                  `total_price` INT NOT NULL,
                  `approved_total_price` INT NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_bookings_users1_idx` (`user_id` ASC),
                  INDEX `fk_bookings_carts1_idx` (`cart_id` ASC),
                  CONSTRAINT `fk_bookings_users1`
                    FOREIGN KEY (`user_id`)
                    REFERENCES `ass`.`users` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION,
                  CONSTRAINT `fk_bookings_carts1`
                    FOREIGN KEY (`cart_id`)
                    REFERENCES `ass`.`carts` (`id`)
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
        Schema::dropIfExists('bookings');
    }
}
