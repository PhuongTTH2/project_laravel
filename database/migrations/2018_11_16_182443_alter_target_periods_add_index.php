<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTargetPeriodsAddIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = 'ALTER TABLE target_periods ADD INDEX index_target_periods_001(commercial_year_month, vr_area_code, broadcaster_code, data_type_id, period_type_id, aggregate_type_id)';
        DB::connection()->getPdo()->exec($sql);

        $sql = 'ALTER TABLE target_periods ADD INDEX index_target_periods_002(period_from_date, period_from_vol, period_to_date, period_to_vol)';
        DB::connection()->getPdo()->exec($sql);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = 'ALTER TABLE target_periods DROP INDEX index_target_periods_001';
        DB::connection()->getPdo()->exec($sql);

        $sql = 'ALTER TABLE target_periods DROP INDEX index_target_periods_002';
        DB::connection()->getPdo()->exec($sql);
    }
}
