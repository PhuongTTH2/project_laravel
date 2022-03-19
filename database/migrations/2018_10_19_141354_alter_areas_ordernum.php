<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAreasOrdernum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('areas', function (Blueprint $table) {
            $table->char('vr_area_code', 2)
                ->after('id');
            $table->integer('order_num_1')
                ->after('area_name');
            $table->integer('order_num_2')
                ->after('order_num_1');
        });

        Schema::table('broadcasters', function (Blueprint $table) {
            $table->integer('broadcaster_code')
                ->after('area_id');
        });

        Schema::table('ratings', function (Blueprint $table) {
            $pdo = DB::connection()->getPdo();
            $pdo->exec('alter table ratings change area_code vr_area_code char(2) not null');
        });

        Schema::table('rating_targets', function (Blueprint $table) {
            $pdo = DB::connection()->getPdo();
            $pdo->exec('alter table rating_targets change area_code vr_area_code char(2) not null');
        });

        Schema::table('target_links', function (Blueprint $table) {
            $pdo = DB::connection()->getPdo();
            $pdo->exec('alter table target_links change area_code vr_area_code char(2) not null');
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
        Schema::table('areas', function (Blueprint $table) {
            $table->dropColumn(['vr_area_code', 'order_num_1', 'order_num_2']);
        });

        Schema::table('broadcasters', function (Blueprint $table) {
            $table->dropColumn('broadcaster_code');
        });

        Schema::table('ratings', function (Blueprint $table) {
            $pdo = DB::connection()->getPdo();
            $pdo->exec('alter table ratings change vr_area_code area_code char(7) not null');
        });

        Schema::table('rating_targets', function (Blueprint $table) {
            $pdo = DB::connection()->getPdo();
            $pdo->exec('alter table rating_targets change vr_area_code area_code char(7) not null');
        });

        Schema::table('target_links', function (Blueprint $table) {
            $pdo = DB::connection()->getPdo();
            $pdo->exec('alter table target_links change vr_area_code area_code char(7) not null');
        });
    }
}
