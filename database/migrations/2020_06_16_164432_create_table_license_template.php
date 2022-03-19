<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateTableLicenseTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $sql = "
        CREATE TABLE IF NOT EXISTS `license_templates` (
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(64) NOT NULL,
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

        $sql = '
            CREATE TABLE IF NOT EXISTS `ass`.`license_template_details` (
              `id` bigint(20) NOT NULL AUTO_INCREMENT,
              `license_template_id` bigint(20) DEFAULT NULL,
              `is_free` TINYINT(1) NOT NULL,
              `broadcast_id` bigint(20) DEFAULT NULL,
              `data_type_id` int(11) DEFAULT NULL,
              `rate_type_id` int(11) DEFAULT NULL,
              `period_from_date` date DEFAULT NULL,
              `period_to_date` date DEFAULT NULL,
              `created_at` datetime NOT NULL,
              `updated_at` datetime NOT NULL,
              `deleted_at` datetime DEFAULT NULL,
              `created_by` bigint(20) DEFAULT NULL,
              `updated_by` bigint(20) DEFAULT NULL,
              `deleted_by` bigint(20) DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `fk_license_template_details_licenses1_idx` (`license_template_id`),
              KEY `fk_license_template_details_broadcasters1_idx` (`broadcast_id`),
              CONSTRAINT `fk_license_template_details_licenses1` FOREIGN KEY (`license_template_id`) REFERENCES `license_templates` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
              CONSTRAINT `fk_license_template_details_broadcasters1` FOREIGN KEY (`broadcast_id`) REFERENCES `broadcasters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ';
        DB::connection()->getPdo()->exec($sql);

        $sql = '
            CREATE TABLE IF NOT EXISTS `ass`.`license_template_target_groups` (
              `id` bigint(20) NOT NULL AUTO_INCREMENT,
              `license_template_detail_id` bigint(20) NOT NULL,
              `target_group_id` bigint(20) NOT NULL,
              `created_at` datetime NOT NULL,
              `updated_at` datetime NOT NULL,
              `deleted_at` datetime DEFAULT NULL,
              `created_by` bigint(20) DEFAULT NULL,
              `updated_by` bigint(20) DEFAULT NULL,
              `deleted_by` bigint(20) DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `fk_license_template_target_groups_license_template_details1_idx` (`license_template_detail_id`),
              CONSTRAINT `fk_license_template_target_groups_license_template_details1` FOREIGN KEY (`license_template_detail_id`) REFERENCES `license_template_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
              UNIQUE INDEX `unique_license_template_target_groups1` (`license_template_detail_id`, `target_group_id`, `deleted_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ';
        DB::connection()->getPdo()->exec($sql);

        $sql = '
            CREATE TABLE IF NOT EXISTS `ass`.`license_template_targets` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `license_template_target_groups_id` bigint(20) NOT NULL,
            `target_id` bigint(20) NOT NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime NOT NULL,
            `deleted_at` datetime DEFAULT NULL,
            `created_by` bigint(20) DEFAULT NULL,
            `updated_by` bigint(20) DEFAULT NULL,
            `deleted_by` bigint(20) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `fk_license_template_targets_license_template_target_groups1_idx` (`license_template_target_groups_id`),
            CONSTRAINT `fk_license_template_targets_license_template_target_groups1` FOREIGN KEY (`license_template_target_groups_id`) REFERENCES `license_template_target_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
            UNIQUE INDEX `unique_license_template_targets1` (`license_template_target_groups_id`, `target_id`, `deleted_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ';
        DB::connection()->getPdo()->exec($sql);

        $sql = '
            CREATE TABLE IF NOT EXISTS `ass`.`license_template_period_types` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `license_template_detail_id` bigint(20) NOT NULL,
            `period_type_id` bigint(20) NOT NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime NOT NULL,
            `deleted_at` datetime DEFAULT NULL,
            `created_by` bigint(20) DEFAULT NULL,
            `updated_by` bigint(20) DEFAULT NULL,
            `deleted_by` bigint(20) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `fk_license_template_period_types_license_template_details1_idx` (`license_template_detail_id`),
            CONSTRAINT `fk_license_template_period_types_license_template_details1` FOREIGN KEY (`license_template_detail_id`) REFERENCES `license_template_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
            UNIQUE INDEX `unique_license_template_period_types1` (`license_template_detail_id`, `period_type_id`, `deleted_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ';
        DB::connection()->getPdo()->exec($sql);

        $sql = '
            CREATE TABLE IF NOT EXISTS `ass`.`license_template_aggregate_types` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `license_template_detail_id` bigint(20) NOT NULL,
            `aggregate_type_id` bigint(20) NOT NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime NOT NULL,
            `deleted_at` datetime DEFAULT NULL,
            `created_by` bigint(20) DEFAULT NULL,
            `updated_by` bigint(20) DEFAULT NULL,
            `deleted_by` bigint(20) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `fk_license_template_ag_types_license_template_details1_idx` (`license_template_detail_id`),
            CONSTRAINT `fk_license_template_ag_types_license_template_details1` FOREIGN KEY (`license_template_detail_id`) REFERENCES `license_template_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
            UNIQUE INDEX `unique_license_template_aggregate_types1` (`license_template_detail_id`, `aggregate_type_id`, `deleted_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
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
        Schema::dropIfExists('license_template_targets');
        Schema::dropIfExists('license_template_target_groups');
        Schema::dropIfExists('license_template_period_types');
        Schema::dropIfExists('license_template_aggregate_types');
        Schema::dropIfExists('license_template_details');
        Schema::dropIfExists('license_templates');
    }
}
