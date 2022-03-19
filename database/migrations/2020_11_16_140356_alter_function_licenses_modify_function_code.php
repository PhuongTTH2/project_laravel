<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFunctionLicensesModifyFunctionCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec('ALTER TABLE function_licenses MODIFY COLUMN function_code CHAR(32) NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('ALTER TABLE function_licenses MODIFY COLUMN function_code CHAR(8) NOT NULL');
    }
}
