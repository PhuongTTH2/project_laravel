<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanningTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`plans` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `plan_name` VARCHAR(64) NOT NULL,
                  `sponsor_name` VARCHAR(64) NOT NULL,
                  `business_category_code` CHAR(2) NOT NULL,
                  `product_category_code` CHAR(5) NOT NULL,
                  `sponsor_product` VARCHAR(64) NOT NULL,
                  `campaign_from_date` DATE NOT NULL,
                  `campaign_to_date` DATE NOT NULL,
                  `commercial_length_15` TINYINT(1) NOT NULL,
                  `commercial_length_30` TINYINT(1) NOT NULL,
                  `commercial_length_45` TINYINT(1) NOT NULL,
                  `commercial_length_60` TINYINT(1) NOT NULL,
                  `area_id` BIGINT NOT NULL,
                  `planning_from_date` DATE NOT NULL,
                  `planning_to_date` DATE NOT NULL,
                  `time_slot_pattern_id` INT NULL,
                  `time_slots` JSON NOT NULL,
                  `custom_time_slot` TINYINT(1) NOT NULL,
                  `budget` INT NOT NULL,
                  `budget_unit_id` INT NOT NULL,
                  `over_buy_num` INT NOT NULL,
                  `over_buy_unit_id` INT NOT NULL,
                  `include_pt` TINYINT(1) NOT NULL,
                  `include_sb` TINYINT(1) NOT NULL,
                  `display_summary` TINYINT(1) NOT NULL,
                  `include_mini_program` TINYINT(1) NOT NULL,
                  `scale` TINYINT NOT NULL,
                  `status` INT NOT NULL DEFAULT 0,
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

            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`plan_targets` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `plan_id` BIGINT NOT NULL,
                  `order_num` INT NOT NULL,
                  `plan_target_name` VARCHAR(64) NOT NULL,
                  `data_type_id` INT NOT NULL,
                  `rate_type_id` INT NOT NULL,
                  `aggregate_type_id` INT NOT NULL,
                  `target_group_code` VARCHAR(32) NOT NULL,
                  `target_code` VARCHAR(32) NOT NULL,
                  `period_type_id` INT NOT NULL,
                  `period_from_date` DATE NOT NULL,
                  `period_to_date` DATE NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `updated_at` DATETIME NOT NULL,
                  `deleted_at` DATETIME NULL,
                  `created_by` BIGINT NULL,
                  `updated_by` BIGINT NULL,
                  `deleted_by` BIGINT NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_plan_targets_plans1_idx` (`plan_id` ASC),
                  CONSTRAINT `fk_plan_targets_plans1`
                    FOREIGN KEY (`plan_id`)
                    REFERENCES `ass`.`plans` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB;
            ';
            DB::connection()->getPdo()->exec($sql);

            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`plan_broadcasters` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `plan_id` BIGINT NOT NULL,
                  `order_num` INT NOT NULL,
                  `broadcaster_id` BIGINT NOT NULL,
                  `result_price` INT NULL,
                  `result_grp` INT NULL,
                  `result_cpr` INT NULL,
                  `created_at` DATETIME NOT NULL,
                  `updated_at` DATETIME NOT NULL,
                  `deleted_at` DATETIME NULL,
                  `created_by` BIGINT NULL,
                  `updated_by` BIGINT NULL,
                  `deleted_by` BIGINT NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_plan_areas_plans1_idx` (`plan_id` ASC),
                  CONSTRAINT `fk_plan_areas_plans1`
                    FOREIGN KEY (`plan_id`)
                    REFERENCES `ass`.`plans` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB;
            ';
            DB::connection()->getPdo()->exec($sql);

            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`plan_commercials` (
                  `id` INT NOT NULL AUTO_INCREMENT,
                  `plan_id` BIGINT NOT NULL,
                  `commercial_id` BIGINT NOT NULL,
                  `rate_main` INT NULL,
                  `rate_sub` INT NULL,
                  `cpr_main` INT NULL,
                  `cpr_sub` INT NULL,
                  `is_over_buy` TINYINT(1) NOT NULL,
                  `selected` TINYINT(1) NOT NULL,
                  `priority` INT NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `updated_at` DATETIME NOT NULL,
                  `deleted_at` DATETIME NULL,
                  `created_by` BIGINT NULL,
                  `updated_by` BIGINT NULL,
                  `deleted_by` BIGINT NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_plan_commercials_plans1_idx` (`plan_id` ASC),
                  CONSTRAINT `fk_plan_commercials_plans1`
                    FOREIGN KEY (`plan_id`)
                    REFERENCES `ass`.`plans` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB;
            ';
            DB::connection()->getPdo()->exec($sql);

            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`time_slot_patterns` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `time_slot_pattern_name` VARCHAR(32) NOT NULL,
                  `time_slot` JSON NOT NULL,
                  `is_preset` TINYINT(1) NOT NULL,
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

            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`holidays` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `holiday` DATE NOT NULL,
                  `memo` VARCHAR(254),
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
        Schema::dropIfExists('holidays');
        Schema::dropIfExists('time_slot_patterns');
        Schema::dropIfExists('plan_commercials');
        Schema::dropIfExists('plan_broadcasters');
        Schema::dropIfExists('plan_targets');
        Schema::dropIfExists('plans');
    }
}
