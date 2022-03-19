<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`companies` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `company_code` CHAR(5) NOT NULL,
                  `company_name` VARCHAR(32) NOT NULL,
                  `company_site_name` VARCHAR(64) NULL,
                  `auth_type_id` INT NOT NULL,
                  `broadcaster_id` BIGINT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_companies_broadcasters1_idx` (`broadcaster_id` ASC),
                  UNIQUE INDEX `company_code_UNIQUE` (`company_code` ASC),
                  CONSTRAINT `fk_companies_broadcasters1`
                    FOREIGN KEY (`broadcaster_id`)
                    REFERENCES `ass`.`broadcasters` (`id`)
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
        Schema::dropIfExists('companies');
    }
}
