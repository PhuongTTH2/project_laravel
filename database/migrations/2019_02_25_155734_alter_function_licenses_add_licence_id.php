<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Eloquent\TimeSlotPattern;

class AlterFunctionLicensesAddLicenceId extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('function_licenses', function(Blueprint $table) {
            $table->dropForeign('fk_function_licenses_companies1');
            $table->dropColumn('company_id');
            $table->bigInteger('license_id')->nullable()->after('id');
            $table->foreign('license_id', 'fk_function_licenses_licenses1')
                ->references('id')
                ->on('licenses')
                ->onDelete('no action')
                ->onUpdate('no action')
            ;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('function_licenses', function(Blueprint $table) {
            $table->dropForeign('fk_function_licenses_licenses1');
            $table->dropColumn('license_id');
            $table->bigInteger('company_id')->after('id');
            $table->foreign('company_id', 'fk_function_licenses_companies1')
                ->references('id')
                ->on('companies')
                ->onDelete('no action')
                ->onUpdate('no action')
            ;
        });
    }
}
