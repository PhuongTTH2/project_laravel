<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBookingsAddComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('bookings', function (Blueprint $table) {
            $table->tinyInteger('material_produce')->default('0')->after('approved_total_price');
            $table->text('comment')->nullable()->after('material_produce');
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
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('material_produce');
            $table->dropColumn('comment');
        });
    }
}
