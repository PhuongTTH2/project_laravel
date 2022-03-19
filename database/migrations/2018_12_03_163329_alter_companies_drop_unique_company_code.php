<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCompaniesDropUniqueCompanyCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = 'ALTER TABLE companies DROP INDEX company_code_UNIQUE';
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
        $sql = 'ALTER TABLE companies ADD UNIQUE INDEX company_code_UNIQUE (`company_code`)';
        DB::connection()->getPdo()->exec($sql);
    }
}
