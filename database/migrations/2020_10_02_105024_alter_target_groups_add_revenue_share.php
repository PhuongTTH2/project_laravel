<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class alterTargetGroupsAddRevenueShare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('target_groups', 'revenue_share')) {
            Schema::table('target_groups', function (Blueprint $table) {
                $table->unsignedSmallInteger('revenue_share')->default(2)->after('target_group_seq');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('target_groups', 'revenue_share')) {
            Schema::table('target_groups', function (Blueprint $table) {
                $table->dropColumn('revenue_share');
            });
        }
    }
}
