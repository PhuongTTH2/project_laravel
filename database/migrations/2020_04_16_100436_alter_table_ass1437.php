<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Eloquent\PeriodType;
use App\Models\Eloquent\AggregateType;

class AlterTableAss1437 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //--------------------------------------------------------------------
        // period_types
        //--------------------------------------------------------------------
        if (!Schema::hasColumn('period_types', 'order_num')) {
            Schema::table('period_types', function (Blueprint $table) {
                $table->integer('order_num')->nullable()->default(0)->after('display_name');
            });
        }
        // 年度平均
        PeriodType::where('period_type_id', PeriodType::PERIOD_TYPE_AVE_YEAR)->update(['order_num' => '1']);
        // 当週
        PeriodType::where('period_type_id', PeriodType::PERIOD_TYPE_THIS_WEEK)->update(['order_num' => '2']);
        // 4週平均
        PeriodType::where('period_type_id', PeriodType::PERIOD_TYPE_AVE_FOUR)->update(['order_num' => '3']);
        // 月平均
        PeriodType::where('period_type_id', PeriodType::PERIOD_TYPE_AVE_MONTH)->update(['order_num' => '4']);
        // 1クール平均
        PeriodType::where('period_type_id', PeriodType::PERIOD_TYPE_AVE_ONE_SEASON)->update(['order_num' => '5']);
        // 2クール平均
        PeriodType::where('period_type_id', PeriodType::PERIOD_TYPE_AVE_TWO_SEASON)->update(['order_num' => '6']);
        // 「－」
        PeriodType::where('period_type_id', 99)->update(['order_num' => '7']);

        //--------------------------------------------------------------------
        // aggregate_types
        //--------------------------------------------------------------------
        if (!Schema::hasColumn('aggregate_types', 'order_num')) {
            Schema::table('aggregate_types', function (Blueprint $table) {
                $table->integer('order_num')->nullable()->default(0)->after('display_name');
            });
        }
        // 毎60分
        AggregateType::where('aggregate_type_id', AggregateType::AGGREGATE_TYPE_60MIN)->update(['order_num' => '1']);
        // 時間区分
        AggregateType::where('aggregate_type_id', AggregateType::AGGREGATE_TYPE_TIME)->update(['order_num' => '2']);
        // 番組コード
        AggregateType::where('aggregate_type_id', AggregateType::AGGREGATE_TYPE_PROGRAM_CODE)->update(['order_num' => '3']);
        // スポット取引
        AggregateType::where('aggregate_type_id', AggregateType::AGGREGATE_TYPE_SPOT)->update(['order_num' => '4']);
        // 「－」
        AggregateType::where('aggregate_type_id', 99)->update(['order_num' => '5']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('period_types', 'order_num')) {
            Schema::table('period_types', function (Blueprint $table) {
                $table->dropColumn('order_num');
            });
        }
        if (Schema::hasColumn('aggregate_types', 'order_num')) {
            Schema::table('aggregate_types', function (Blueprint $table) {
                $table->dropColumn('order_num');
            });
        }
    }
}
