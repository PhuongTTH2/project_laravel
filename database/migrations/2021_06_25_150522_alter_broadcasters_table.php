<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBroadcastersTable extends Migration
{
    public function up()
    {
        Schema::table('broadcasters', function (Blueprint $table) {
            DB::connection()->getPdo()->exec('ALTER TABLE `broadcasters` ADD `default_commercial_length` TINYINT NOT NULL DEFAULT "15" AFTER `material_produce`;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            DB::connection()->getPdo()->exec('ALTER TABLE `broadcasters` DROP `default_commercial_length`;');
        });
    }
}
