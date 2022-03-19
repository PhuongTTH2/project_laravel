<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersAddFutureProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'future_program')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('future_program')->default(0)->after('terms');
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
        if (Schema::hasColumn('users', 'future_program')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('future_program');
            });
        }
    }
}
