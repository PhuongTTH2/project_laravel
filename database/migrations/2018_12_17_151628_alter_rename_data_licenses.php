<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRenameDataLicenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * licenses
         */
        $sql = 'RENAME TABLE `data_licenses` TO `licenses`';
        DB::connection()->getPdo()->exec($sql);
        $sql = "update licenses set created_at = '2018-11-01', updated_at = '2018-11-01' where created_at < '1970-01-01'";
        DB::connection()->getPdo()->exec($sql);
        // rename index
        $sql = "
        ALTER TABLE `licenses`
            DROP INDEX `fk_data_licenses_companies21_idx`,
            ADD INDEX `fk_licenses_companies1_idx` (`company_id`);
        ";
        DB::connection()->getPdo()->exec($sql);
        // rename foreign-key
        $sql = "
        ALTER TABLE `licenses`
            DROP FOREIGN KEY `fk_data_licenses_companies21`;
        ";
        DB::connection()->getPdo()->exec($sql);
        $sql = "
        ALTER TABLE `licenses`
            ADD CONSTRAINT `fk_licenses_companies1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION;
        ";
        DB::connection()->getPdo()->exec($sql);

        /**
         * data_license_details
         */
        Schema::table('data_license_details', function (Blueprint $table) {
            $table->renameColumn('data_license_id', 'license_id');
        });
        $sql = "update data_license_details set created_at = '2018-11-01', updated_at = '2018-11-01' where created_at < '1970-01-01'";
        DB::connection()->getPdo()->exec($sql);
        // rename index
        $sql = "
        ALTER TABLE `data_license_details`
            DROP INDEX `fk_data_license_details_data_licenses1_idx`,
            ADD INDEX `fk_data_license_details_licenses1_idx` (`license_id`);
        ";
        DB::connection()->getPdo()->exec($sql);
        // rename foreign-key
        $sql = "
        ALTER TABLE `data_license_details`
            DROP FOREIGN KEY `fk_data_license_details_data_licenses1`;
        ";
        DB::connection()->getPdo()->exec($sql);
        $sql = "
        ALTER TABLE `data_license_details`
        	ADD CONSTRAINT `fk_data_license_details_licenses1` FOREIGN KEY (`license_id`) REFERENCES `licenses` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION;
        ";
        DB::connection()->getPdo()->exec($sql);

        /**
         * available_broadcasters
         */
        Schema::table('available_broadcasters', function (Blueprint $table) {
            $table->renameColumn('data_license_id', 'license_id');
        });
        $sql = "update available_broadcasters set created_at = '2018-11-01', updated_at = '2018-11-01' where created_at < '1970-01-01'";
        DB::connection()->getPdo()->exec($sql);
        // rename index
        $sql = "
        ALTER TABLE `available_broadcasters`
            DROP INDEX `fk_available_broadcasters_data_licenses1_idx`,
            ADD INDEX `fk_available_broadcasters_licenses1_idx` (`license_id`);
        ";
        DB::connection()->getPdo()->exec($sql);
        // rename foreign-key
        $sql = "
        ALTER TABLE `available_broadcasters`
            DROP FOREIGN KEY `fk_available_broadcasters_data_licenses1`;
        ";
        DB::connection()->getPdo()->exec($sql);
        $sql = "
        ALTER TABLE `available_broadcasters`
        	ADD CONSTRAINT `fk_available_broadcasters_licenses1` FOREIGN KEY (`license_id`) REFERENCES `licenses` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION;
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
        /**
         * data_license_details
         */
        // rename index
        $sql = "
        ALTER TABLE `data_license_details`
            DROP INDEX `fk_data_license_details_licenses1_idx`,
            ADD INDEX `fk_data_license_details_data_licenses1_idx` (`license_id`);
        ";
        DB::connection()->getPdo()->exec($sql);
        // rename foreign-key
        $sql = "
        ALTER TABLE `data_license_details`
            DROP FOREIGN KEY `fk_data_license_details_licenses1`;
        ";
        DB::connection()->getPdo()->exec($sql);
        $sql = "
        ALTER TABLE `data_license_details`
        	ADD CONSTRAINT `fk_data_license_details_data_licenses1` FOREIGN KEY (`license_id`) REFERENCES `licenses` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION;
        ";
        DB::connection()->getPdo()->exec($sql);

        /**
         * available_broadcasters
         */
        // rename index
        $sql = "
        ALTER TABLE `available_broadcasters`
            DROP INDEX `fk_available_broadcasters_licenses1_idx`,
            ADD INDEX `fk_available_broadcasters_data_licenses1_idx` (`license_id`);
        ";
        DB::connection()->getPdo()->exec($sql);
        // rename foreign-key
        $sql = "
        ALTER TABLE `available_broadcasters`
            DROP FOREIGN KEY `fk_available_broadcasters_licenses1`;
        ";
        DB::connection()->getPdo()->exec($sql);
        $sql = "
        ALTER TABLE `available_broadcasters`
        	ADD CONSTRAINT `fk_available_broadcasters_data_licenses1` FOREIGN KEY (`license_id`) REFERENCES `licenses` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION;
        ";
        DB::connection()->getPdo()->exec($sql);

        /**
         * licenses
         */
        // rename index
        $sql = "
        ALTER TABLE `licenses`
            DROP INDEX `fk_licenses_companies1_idx`,
            ADD INDEX `fk_data_licenses_companies21_idx` (`company_id`);
        ";
        DB::connection()->getPdo()->exec($sql);
        // rename foreign-key
        $sql = "
        ALTER TABLE `licenses`
            DROP FOREIGN KEY `fk_licenses_companies1`;
        ";
        DB::connection()->getPdo()->exec($sql);
        $sql = "
        ALTER TABLE `licenses`
            ADD CONSTRAINT `fk_data_licenses_companies2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION;
        ";
        DB::connection()->getPdo()->exec($sql);

        //
        $sql = 'RENAME TABLE `licenses` TO `data_licenses`';
        DB::connection()->getPdo()->exec($sql);

        Schema::table('data_license_details', function (Blueprint $table) {
            $table->renameColumn('license_id', 'data_license_id');
        });

        Schema::table('available_broadcasters', function (Blueprint $table) {
            $table->renameColumn('license_id', 'data_license_id');
        });
    }
}
