<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_licenses', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`company_licenses` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `company_id` BIGINT NOT NULL,
                  `function_code` CHAR(8) NOT NULL,
                  `data_scope` JSON NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_company_licenses_companies1_idx` (`company_id` ASC),
                  CONSTRAINT `fk_company_licenses_companies1`
                    FOREIGN KEY (`company_id`)
                    REFERENCES `ass`.`companies` (`id`)
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
        Schema::dropIfExists('company_licenses');
    }
}
