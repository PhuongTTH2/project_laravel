<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * ASS-627 【ASS枠アップロード】Excel対応と項目追加
 */
class AlterBadgesAddColumnsRelationId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('badges', function(Blueprint $table) {
            $table->bigInteger('booking_id')->nullable()->after('user_id');
            $table->foreign('booking_id', 'fk_badges_bookings1')
                ->references('id')
                ->on('bookings')
                ->onDelete('no action')
                ->onUpdate('no action')
            ;
            $table->bigInteger('commercial_id')->nullable()->after('booking_id');
            $table->foreign('commercial_id', 'fk_badges_commercials1')
                ->references('id')
                ->on('commercials')
                ->onDelete('no action')
                ->onUpdate('no action')
            ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('badges', function(Blueprint $table) {
            $table->dropForeign('fk_badges_bookings1');
            $table->dropColumn('booking_id');
            $table->dropForeign('fk_badges_commercials1');
            $table->dropColumn('commercial_id');
        });
    }
}

