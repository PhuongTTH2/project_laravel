<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiKeysSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = '
        CREATE TABLE IF NOT EXISTS `ass`.`api_keys_system` (
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `api_id` BIGINT NOT NULL,
            `key` CHAR(32) NOT NULL,
            `company_code` CHAR(10) NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL,
            `deleted_at` DATETIME NULL,
            `created_by` BIGINT NULL,
            `updated_by` BIGINT NULL,
            `deleted_by` BIGINT NULL,
            PRIMARY KEY (`id`)
          )ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
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
        Schema::dropIfExists('api_keys_system');
    }
}
