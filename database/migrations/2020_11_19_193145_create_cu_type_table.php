<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "
            CREATE TABLE `cu_type_lengths` (
              `id` bigint(20) NOT NULL AUTO_INCREMENT,
              `code` varchar(64) NOT NULL,
              `name` varchar(64) NOT NULL,
              `order_num` smallint NOT NULL,
              `created_at` datetime NOT NULL,
              `created_by` bigint(20) DEFAULT NULL,
              `updated_at` datetime NOT NULL,
              `updated_by` bigint(20) DEFAULT NULL,
              `deleted_at` datetime DEFAULT NULL,
              `deleted_by` bigint(20) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
        DB::connection()->getPdo()->exec($sql);

        $sql = "
            CREATE TABLE `cu_type_targets` (
              `id` bigint(20) NOT NULL AUTO_INCREMENT,
              `code` varchar(64) NOT NULL,
              `name` varchar(64) NOT NULL,
              `order_num` smallint NOT NULL,
              `created_at` datetime NOT NULL,
              `created_by` bigint(20) DEFAULT NULL,
              `updated_at` datetime NOT NULL,
              `updated_by` bigint(20) DEFAULT NULL,
              `deleted_at` datetime DEFAULT NULL,
              `deleted_by` bigint(20) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
        DB::connection()->getPdo()->exec($sql);

        $sql = "
            CREATE TABLE `cu_type_data_sources` (
              `id` bigint(20) NOT NULL AUTO_INCREMENT,
              `code` varchar(64) NOT NULL,
              `name` varchar(64) NOT NULL,
              `order_num` smallint NOT NULL,
              `created_at` datetime NOT NULL,
              `created_by` bigint(20) DEFAULT NULL,
              `updated_at` datetime NOT NULL,
              `updated_by` bigint(20) DEFAULT NULL,
              `deleted_at` datetime DEFAULT NULL,
              `deleted_by` bigint(20) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
        DB::connection()->getPdo()->exec($sql);

        $sql = "
            CREATE TABLE `cu_type_devices` (
              `id` bigint(20) NOT NULL AUTO_INCREMENT,
              `code` varchar(64) NOT NULL,
              `name` varchar(64) NOT NULL,
              `order_num` smallint NOT NULL,
              `created_at` datetime NOT NULL,
              `created_by` bigint(20) DEFAULT NULL,
              `updated_at` datetime NOT NULL,
              `updated_by` bigint(20) DEFAULT NULL,
              `deleted_at` datetime DEFAULT NULL,
              `deleted_by` bigint(20) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
        DB::connection()->getPdo()->exec($sql);

        $sql = "
            CREATE TABLE `cu_type_os` (
              `id` bigint(20) NOT NULL AUTO_INCREMENT,
              `code` varchar(64) NOT NULL,
              `name` varchar(64) NOT NULL,
              `order_num` smallint NOT NULL,
              `created_at` datetime NOT NULL,
              `created_by` bigint(20) DEFAULT NULL,
              `updated_at` datetime NOT NULL,
              `updated_by` bigint(20) DEFAULT NULL,
              `deleted_at` datetime DEFAULT NULL,
              `deleted_by` bigint(20) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
        DB::connection()->getPdo()->exec($sql);

        $sql = "
            CREATE TABLE `cu_type_clickables` (
              `id` bigint(20) NOT NULL AUTO_INCREMENT,
              `code` varchar(64) NOT NULL,
              `name` varchar(64) NOT NULL,
              `order_num` smallint NOT NULL,
              `created_at` datetime NOT NULL,
              `created_by` bigint(20) DEFAULT NULL,
              `updated_at` datetime NOT NULL,
              `updated_by` bigint(20) DEFAULT NULL,
              `deleted_at` datetime DEFAULT NULL,
              `deleted_by` bigint(20) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
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
        Schema::dropIfExists('cu_type_lengths');
        Schema::dropIfExists('cu_type_targets');
        Schema::dropIfExists('cu_type_data_sources');
        Schema::dropIfExists('cu_type_devices');
        Schema::dropIfExists('cu_type_os');
        Schema::dropIfExists('cu_type_clickables');
    }
}
