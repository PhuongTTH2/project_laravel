<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTypesRateTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $sql = '
        CREATE TABLE IF NOT EXISTS `ass`.`data_types` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `data_type_id` INT NOT NULL,
          `data_type_name` TEXT NOT NULL,
          `display_name` TEXT NOT NULL,
          `created_at` DATETIME NOT NULL,
          `updated_at` DATETIME NOT NULL,
          `deleted_at` DATETIME NULL,
          `created_by` BIGINT NULL,
          `updated_by` BIGINT NULL,
          `deleted_by` BIGINT NULL,
          PRIMARY KEY (`id`),
          INDEX `data_type_idx` (`data_type_id` ASC) )
        ENGINE = InnoDB;
        ';
        DB::connection()->getPdo()->exec($sql);

        $sql = "
        REPLACE INTO `data_types` (`id`, `data_type_id`, `data_type_name`, `display_name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
        	(1, 1, '視聴率', '視聴率', '2019-04-12 15:37:27', '2019-04-12 15:37:27', NULL, -1, -1, NULL),
        	(2, 2, 'CUBIC', 'CUBIC', '2019-04-12 15:37:27', '2019-04-12 15:37:27', NULL, -1, -1, NULL),
        	(3, 3, 'AdvancedTarget', 'AdvancedTarget', '2019-04-12 15:37:27', '2019-04-12 15:37:27', NULL, -1, -1, NULL);
        ";
        DB::connection()->getPdo()->exec($sql);

        $sql = '
        CREATE TABLE IF NOT EXISTS `ass`.`rate_types` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `data_type_id` INT NOT NULL,
          `rate_type_id` INT NOT NULL,
          `rate_type_name` TEXT NOT NULL,
          `display_name` TEXT NOT NULL,
          `scale` SMALLINT NOT NULL,
          `created_at` DATETIME NOT NULL,
          `updated_at` DATETIME NOT NULL,
          `deleted_at` DATETIME NULL,
          `created_by` BIGINT NULL,
          `updated_by` BIGINT NULL,
          `deleted_by` BIGINT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_data_type1_idx` (`data_type_id` ASC) ,
          INDEX `data_rate_idx` (`data_type_id` ASC, `rate_type_id` ASC) ,
          CONSTRAINT `fk_rate_types_data_type1`
            FOREIGN KEY (`data_type_id`)
            REFERENCES `ass`.`data_types` (`data_type_id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB;
        ';
        DB::connection()->getPdo()->exec($sql);

        $sql = "
        REPLACE INTO `rate_types` (`id`, `data_type_id`, `rate_type_id`, `rate_type_name`, `display_name`, `scale`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
        	(1, 1, 1, '視聴率', '視聴率', 1, '2019-04-12 15:39:13', '2019-04-12 15:39:13', NULL, -1, -1, NULL),
        	(2, 1, 2, 'P+C7', 'P+C7', 1, '2019-04-12 15:39:13', '2019-04-12 15:39:13', NULL, -1, -1, NULL),
        	(3, 2, 1, '接触率', '接触率', 1, '2019-04-12 15:39:13', '2019-04-12 15:39:13', NULL, -1, -1, NULL),
        	(4, 2, 2, 'P+C7', 'P+C7', 1, '2019-04-12 15:39:13', '2019-04-12 15:39:13', NULL, -1, -1, NULL),
        	(5, 3, 1, '視聴率', '視聴率', 1, '2019-04-12 15:39:13', '2019-04-12 15:39:13', NULL, -1, -1, NULL),
        	(6, 3, 2, 'P+C7', 'P+C7', 1, '2019-04-12 15:39:13', '2019-04-12 15:39:13', NULL, -1, -1, NULL);
        ";
        DB::connection()->getPdo()->exec($sql);

        $sql = '
        CREATE TABLE IF NOT EXISTS `ass`.`period_types` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `data_type_id` INT NOT NULL,
          `period_type_id` INT NOT NULL,
          `period_type_name` TEXT NOT NULL,
          `display_name` TEXT NOT NULL,
          `created_at` DATETIME NOT NULL,
          `updated_at` DATETIME NOT NULL,
          `deleted_at` DATETIME NULL,
          `created_by` BIGINT NULL,
          `updated_by` BIGINT NULL,
          `deleted_by` BIGINT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_period_types_data_type_idx` (`data_type_id` ASC) ,
          INDEX `data_period_idx` (`data_type_id` ASC, `period_type_id` ASC) ,
          CONSTRAINT `fk_period_types_data_type`
            FOREIGN KEY (`data_type_id`)
            REFERENCES `ass`.`data_types` (`data_type_id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB;
        ';
        DB::connection()->getPdo()->exec($sql);

        $sql = "
        REPLACE INTO `period_types` (`id`, `data_type_id`, `period_type_id`, `period_type_name`, `display_name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
        	(1, 1, 11, '当週', '当週', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(2, 1, 12, '4週平均', '4週平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(3, 1, 13, '月平均', '月平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(4, 1, 21, '1クール平均', '1クール平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(5, 1, 22, '2クール平均', '2クール平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(6, 1, 31, '年度平均', '年度平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(7, 2, 11, '当週', '当週', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(8, 2, 12, '4週平均', '4週平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(9, 2, 13, '月平均', '月平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(10, 2, 21, '1クール平均', '1クール平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(11, 2, 22, '2クール平均', '2クール平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(12, 3, 11, '当週', '当週', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(13, 3, 12, '4週平均', '4週平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(14, 3, 13, '月平均', '月平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(15, 3, 21, '1クール平均', '1クール平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(16, 3, 22, '2クール平均', '2クール平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL),
        	(17, 3, 31, '年度平均', '年度平均', '2019-04-12 17:20:37', '2019-04-12 17:20:37', NULL, -1, -1, NULL);
        ";
        DB::connection()->getPdo()->exec($sql);

        $sql = '
        CREATE TABLE IF NOT EXISTS `ass`.`aggregate_types` (
          `id` BIGINT NOT NULL AUTO_INCREMENT,
          `data_type_id` INT NOT NULL,
          `aggregate_type_id` INT NOT NULL,
          `aggregate_type_name` TEXT NOT NULL,
          `display_name` TEXT NOT NULL,
          `created_at` DATETIME NOT NULL,
          `updated_at` DATETIME NOT NULL,
          `deleted_at` DATETIME NULL,
          `created_by` BIGINT NULL,
          `updated_by` BIGINT NULL,
          `deleted_by` BIGINT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_data_type_id_idx` (`data_type_id` ASC) ,
          INDEX `data_aggregate_idx` (`data_type_id` ASC, `aggregate_type_id` ASC) ,
          CONSTRAINT `fk_aggregate_types_data_type1`
            FOREIGN KEY (`data_type_id`)
            REFERENCES `ass`.`data_types` (`data_type_id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB;
        ';
        DB::connection()->getPdo()->exec($sql);

        $sql = "
        REPLACE INTO `aggregate_types` (`id`, `data_type_id`, `aggregate_type_id`, `aggregate_type_name`, `display_name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
        	(1, 1, 1, '時間区分', '時間区分', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL),
        	(2, 1, 2, '番組コード', '番組コード', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL),
        	(3, 1, 3, 'スポット取引', 'スポット取引', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL),
        	(4, 1, 4, '毎60分', '毎60分', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL),
        	(5, 2, 1, '時間区分', '時間区分', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL),
        	(6, 2, 2, '番組コード', '番組コード', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL),
        	(7, 2, 3, 'スポット取引', 'スポット取引', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL),
        	(8, 2, 4, '毎60分', '毎60分', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL),
        	(9, 3, 1, '時間区分', '時間区分', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL),
        	(10, 3, 2, '番組コード', '番組コード', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL),
        	(11, 3, 3, 'スポット取引', 'スポット取引', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL),
        	(12, 3, 4, '毎60分', '毎60分', '2019-04-12 17:20:45', '2019-04-12 17:20:45', NULL, -1, -1, NULL);
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
        //
        Schema::dropIfExists('rate_types');
        Schema::dropIfExists('period_types');
        Schema::dropIfExists('aggregate_types');
        Schema::dropIfExists('data_types');
    }
}
