<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCompanyBusinessCodesDeletedBy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = 'ALTER TABLE `company_business_codes` CHANGE `deleted_by` `deleted_by` BIGINT(20) NULL;';
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = 'ALTER TABLE `company_business_codes` CHANGE `deleted_by` `deleted_by` DATETIME NULL;';
        DB::connection()->getPdo()->exec($sql);
    }
}
