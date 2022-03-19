<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTargetsChangeLength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('targets', function (Blueprint $table) {
            $table->string('target_name', 128)->change();

            //tinyint‚Ímigrate change•s‰Â‚È‚Ì‚Å’¼SQL‚Å‘Î‰ž
            $pdo = DB::connection()->getPdo();
            $pdo->exec('alter table targets modify pattern01 tinyint(1) default null');
            $pdo->exec('alter table targets modify pattern02 tinyint(1) default null');
            $pdo->exec('alter table targets modify pattern03 tinyint(1) default null');
            $pdo->exec('alter table targets modify pattern04 tinyint(1) default null');
            $pdo->exec('alter table targets modify pattern05 tinyint(1) default null');
            $pdo->exec('alter table targets modify pattern06 tinyint(1) default null');
            $pdo->exec('alter table targets modify pattern07 tinyint(1) default null');
            $pdo->exec('alter table targets modify pattern08 tinyint(1) default null');
            $pdo->exec('alter table targets modify pattern09 tinyint(1) default null');
            $pdo->exec('alter table targets modify pattern10 tinyint(1) default null');
        });
        Schema::table('target_groups', function (Blueprint $table) {
            $table->string('target_group_name', 128)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('targets', function (Blueprint $table) {
            $table->string('target_name', 32)->change();
        });
        Schema::table('target_groups', function (Blueprint $table) {
            $table->string('target_group_name', 32)->change();
        });
    }
}
