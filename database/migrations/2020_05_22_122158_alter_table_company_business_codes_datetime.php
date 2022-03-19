<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Eloquent\PeriodType;
use App\Models\Eloquent\AggregateType;

class AlterTableCompanyBusinessCodesDatetime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec(
            'ALTER TABLE `company_business_codes` MODIFY `created_at` timestamp NULL DEFAULT NULL AFTER `order_num`;'
        );
        DB::connection()->getPdo()->exec(
            'ALTER TABLE `company_business_codes` MODIFY `updated_at` timestamp NULL DEFAULT NULL AFTER `created_at`;'
        );
        Schema::table('company_business_codes', function (Blueprint $table) {
            if (!Schema::hasColumn('company_business_codes', 'created_by')) {
                $table->bigInteger('created_by')->after('created_at');
            }
            if (!Schema::hasColumn('company_business_codes', 'updated_by')) {
                $table->bigInteger('updated_by')->after('updated_at');
            }
            if (!Schema::hasColumn('company_business_codes', 'deleted_at')) {
                $table->dateTime('deleted_at')->nullable();
            }
            if (!Schema::hasColumn('company_business_codes', 'deleted_by')) {
                $table->dateTime('deleted_by')->nullable();
            }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec(
            'ALTER TABLE `company_business_codes` MODIFY `created_at` timestamp NULL DEFAULT NULL AFTER `id`;'
        );
        DB::connection()->getPdo()->exec(
            'ALTER TABLE `company_business_codes` MODIFY `updated_at` timestamp NULL DEFAULT NULL AFTER `created_at`;'
        );
        Schema::table('company_business_codes', function (Blueprint $table) {
            if (Schema::hasColumn('company_business_codes', 'created_by')) {
                $table->dropColumn('created_by');
            }
            if (Schema::hasColumn('company_business_codes', 'updated_by')) {
                $table->dropColumn('updated_by');
            }
            if (Schema::hasColumn('company_business_codes', 'deleted_at')) {
                $table->dropColumn('deleted_at');
            }
            if (Schema::hasColumn('company_business_codes', 'deleted_by')) {
                $table->dropColumn('deleted_by');
            }
        });
    }
}
