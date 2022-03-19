<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCommercialsChgUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "
        ALTER TABLE `commercials`
        	DROP INDEX `hash_code_UNIQUE`,
        	ADD UNIQUE INDEX `hash_code_UNIQUE` (`key_hash_unique_code`(255), `code_ass_plus`);
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
        $sql = "
        ALTER TABLE `commercials`
        	DROP INDEX `hash_code_UNIQUE`,
        	ADD UNIQUE INDEX `hash_code_UNIQUE` (`key_hash_unique_code`(768));
        ";
        DB::connection()->getPdo()->exec($sql);
    }
}
