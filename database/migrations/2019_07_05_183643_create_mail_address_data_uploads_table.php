<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailAddressDataUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = '
        CREATE TABLE IF NOT EXISTS `ass`.`mail_address_data_uploads` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `data_type_id` INT NOT NULL,
          `to` TEXT NOT NULL,
          `cc` TEXT DEFAULT NULL,
          `bcc` TEXT DEFAULT NULL,
          `created_at` DATETIME NOT NULL,
          `updated_at` DATETIME NOT NULL,
          `deleted_at` DATETIME NULL,
          `created_by` BIGINT NULL,
          `updated_by` BIGINT NULL,
          `deleted_by` BIGINT NULL,
          PRIMARY KEY (`id`),
          CONSTRAINT `fk_mail_address_data_uploads_data_type1`
            FOREIGN KEY (`data_type_id`)
            REFERENCES `ass`.`data_types` (`data_type_id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
        )ENGINE = InnoDB;
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
        Schema::dropIfExists('mail_address_data_uploads');
    }
}
