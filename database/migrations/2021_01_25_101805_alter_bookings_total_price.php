<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBookingsTotalPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('bookings', 'total_price')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->bigInteger('total_price')->change();
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
        if (Schema::hasColumn('bookings', 'total_price')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->integer('total_price')->change();
            });
        }
    }
}
