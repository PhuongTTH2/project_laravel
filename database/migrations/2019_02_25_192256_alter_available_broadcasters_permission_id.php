<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Eloquent\TimeSlotPattern;

class AlterAvailableBroadcastersPermissionId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('available_broadcasters', function (Blueprint $table) {
            $table->integer('permission_id')->default(2)->after('broadcaster_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('available_broadcasters', function (Blueprint $table) {
            $table->dropColumn('permission_id');
        });
    }
}
