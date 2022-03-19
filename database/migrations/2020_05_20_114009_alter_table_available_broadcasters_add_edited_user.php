<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAvailableBroadcastersAddEditedUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('available_broadcasters', 'edited_user')) {
            Schema::table('available_broadcasters', function (Blueprint $table) {
                $table->boolean('edited_user')->default(false)->after('permission_id');
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
        if (Schema::hasColumn('available_broadcasters', 'edited_user')) {
            Schema::table('available_broadcasters', function (Blueprint $table) {
                $table->dropColumn('edited_user');
            });
        }
    }
}
