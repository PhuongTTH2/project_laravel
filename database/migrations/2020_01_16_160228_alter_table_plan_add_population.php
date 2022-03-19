<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Eloquent\PlanTarget;
use App\Models\Eloquent\Company;
use App\Models\Eloquent\User;

class AlterTablePlanAddPopulation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('plan_targets', function (Blueprint $table) {
            $table->integer('population_type_id')->default(0)->after('period_to_date');
        });
        // 既存データは、company->can_use_gyokyomaster を見て =1:自社マスタ, =2:VRマスタとする
        $company_gyokyo = Company::withTrashed()
            ->select(['id', 'can_use_gyokyomaster'])
            ->get()
            ->mapWithKeys(function($cp) {
                return [$cp->id => $cp->can_use_gyokyomaster];
            });
        PlanTarget::select('created_by')
            ->groupBy('created_by')
            ->get()->each(function($pt) use ($company_gyokyo) {
                $p = $company_gyokyo->get(User::withTrashed()->find($pt->created_by)->company_id) ? 1 : 2;
                PlanTarget::where('created_by', $pt->created_by)
                    ->update(['population_type_id' => $p]);
            });
        //
        Schema::table('plan_commercials', function (Blueprint $table) {
            $table->integer('cpm_main')->nullable()->after('priority');
            $table->integer('cpm_sub')->nullable()->after('cpm_main');
            $table->integer('population_main')->nullable()->after('cpm_sub');
            $table->integer('population_sub')->nullable()->after('population_main');
        });
        //
        Schema::table('plan_broadcasters', function (Blueprint $table) {
            $table->integer('result_cpm')->nullable()->after('result_cpr');
            $table->integer('result_population')->nullable()->after('result_cpm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('plan_targets', function (Blueprint $table) {
            $table->dropColumn('population_type_id');
        });
        //
        Schema::table('plan_commercials', function (Blueprint $table) {
            $table->dropColumn('cpm_main');
            $table->dropColumn('cpm_sub');
            $table->dropColumn('population_main');
            $table->dropColumn('population_sub');
        });
        //
        Schema::table('plan_broadcasters', function (Blueprint $table) {
            $table->dropColumn('result_cpm');
            $table->dropColumn('result_population');
        });
    }
}
