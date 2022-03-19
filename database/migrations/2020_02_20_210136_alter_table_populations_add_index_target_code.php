<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Eloquent\PlanTarget;
use App\Models\Eloquent\Company;
use App\Models\Eloquent\User;

class AlterTablePopulationsAddIndexTargetCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach(['gyokyo_populations', 'gyokyo_cubic_populations', 'vr_populations', 'vr_cubic_populations'] as $tbl) {
            DB::connection()->getPdo()->exec(sprintf('ALTER TABLE `%s` ADD INDEX index_%s_001(`target_code`)', $tbl, $tbl));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach(['gyokyo_populations', 'gyokyo_cubic_populations', 'vr_populations', 'vr_cubic_populations'] as $tbl) {
            DB::connection()->getPdo()->exec(sprintf('ALTER TABLE `%s` DROP INDEX index_%s_001', $tbl, $tbl));
        }
    }
}
