<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Eloquent\DataType;
use App\Models\Eloquent\RateType;
use App\Models\Eloquent\PeriodType;
use App\Models\Eloquent\AggregateType;

class AlterTableDataTypesAddImportData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('data_types', function (Blueprint $table) {
            $table->string('csv_filename_part')->nullable()->after('display_name');
            $table->string('targetperiods_csv_data')->nullable()->after('csv_filename_part');
        });
        DataType::where('data_type_id', 1)->update([
            'csv_filename_part' => 'PM',
            'targetperiods_csv_data' => 'PM視聴率',
        ]);
        DataType::where('data_type_id', 2)->update([
            'csv_filename_part' => 'CUBIC',
            'targetperiods_csv_data' => 'CUBIC',
        ]);
        DataType::where('data_type_id', 3)->update([
            'csv_filename_part' => 'ADGET',
            'targetperiods_csv_data' => 'AdvancedTarget',
        ]);

        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=0;');
        // TVI データ
        $sql = "
        REPLACE INTO `data_types` (`id`, `data_type_id`, `data_type_name`, `display_name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
            (4, 4, 'TVISION', 'TVISION', '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL);
        ";
        DB::connection()->getPdo()->exec($sql);

        DataType::where('data_type_id', 4)->update([
            'csv_filename_part' => 'TVI',
            'targetperiods_csv_data' => 'TVI',
        ]);

        $sql = "
        REPLACE INTO `rate_types` (`id`, `data_type_id`, `rate_type_id`, `rate_type_name`, `display_name`, `scale`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
        	(7, 4, 3, 'VI', 'VI', 2, '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL),
            (8, 4, 4, 'AI', 'AI', 2, '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL),
        	(9, 4, 5, 'VIxAI', 'VIxAI', 2, '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL);
        ";
        DB::connection()->getPdo()->exec($sql);
        $rt = RateType::where('data_type_id', 1)->get()->first();
        if ($rt) $rt->save();

        DB::connection()->getPdo()->exec("DELETE FROM period_types WHERE data_type_id = 4;");
        $sql = "
        REPLACE INTO `period_types` (`id`, `data_type_id`, `period_type_id`, `period_type_name`, `display_name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
            (18, 4, 11, '当週', '当週', '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL),
            (19, 4, 12, '4週平均', '4週平均', '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL),
            (20, 4, 13, '月平均', '月平均', '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL),
            (21, 4, 21, '1クール平均', '1クール平均', '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL),
            (22, 4, 22, '2クール平均', '2クール平均', '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL),
        	(23, 4, 31, '年度平均', '年度平均', '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL);
        ";
        DB::connection()->getPdo()->exec($sql);
        $pt = PeriodType::where('data_type_id', 1)->get()->first();
        if ($pt) $pt->save();

        DB::connection()->getPdo()->exec("DELETE FROM aggregate_types WHERE data_type_id = 4;");
        $sql = "
        REPLACE INTO `aggregate_types` (`id`, `data_type_id`, `aggregate_type_id`, `aggregate_type_name`, `display_name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
            (13, 4, 1, '時間区分', '時間区分', '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL),
            (14, 4, 2, '番組コード', '番組コード', '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL),
            (15, 4, 3, 'スポット取引', 'スポット取引', '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL),
        	(16, 4, 4, '毎60分', '毎60分', '2019-06-01 00:00:00', '2019-06-01 00:00:00', NULL, -1, -1, NULL);
        ";
        DB::connection()->getPdo()->exec($sql);
        $at = AggregateType::where('data_type_id', 1)->get()->first();
        if ($at) $at->save();

        // targets target_codeがuniqueなのでreplaceできる
        DB::connection()->getPdo()->exec("
        REPLACE INTO `targets` (`target_code`, `target_name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
            ('TVI100', '個人全体', '2019-06-01 00:00:00', '2019-06-01 00:00:00', -1, -1),
            ('TVI101', '男', '2019-06-01 00:00:00', '2019-06-01 00:00:00', -1, -1),
            ('TVI102', '女', '2019-06-01 00:00:00', '2019-06-01 00:00:00', -1, -1);
        ");

        // target_groups target_group_codeがuniqueなのでreplaceできる
        DB::connection()->getPdo()->exec("
        REPLACE INTO `target_groups` (`target_group_code`, `target_group_name`, `target_group_seq`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
            ('TVIA1', '基本属性', '1', '2019-06-01 00:00:00', '2019-06-01 00:00:00', -1, -1);
        ");

        // target_links
        DB::connection()->getPdo()->exec("DELETE FROM target_links WHERE data_type_id = 4;");
        DB::connection()->getPdo()->exec("
        INSERT INTO `target_links` (`data_type_id`, `vr_area_code`, `target_group_code`, `target_code`, `target_seq`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
            (4, 51, 'TVIA1', 'TVI100', 1, '2019-06-01 00:00:00', '2019-06-01 00:00:00', -1, -1),
            (4, 51, 'TVIA1', 'TVI101', 2, '2019-06-01 00:00:00', '2019-06-01 00:00:00', -1, -1),
            (4, 51, 'TVIA1', 'TVI102', 3, '2019-06-01 00:00:00', '2019-06-01 00:00:00', -1, -1);
        ");

        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('data_types', function (Blueprint $table) {
            $table->dropColumn('csv_filename_part');
            $table->dropColumn('targetperiods_csv_data');
        });
    }
}
