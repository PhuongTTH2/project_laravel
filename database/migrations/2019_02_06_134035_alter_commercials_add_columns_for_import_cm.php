<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * ASS-627 【ASS枠アップロード】Excel対応と項目追加
 */
class AlterCommercialsAddColumnsForImportCm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commercials', function (Blueprint $table) {
            $table->char('reserve_cm', 2)->nullable()->after('cancel_limit_time');
            $table->string('program_title', 64)->nullable()->after('reserve_cm');
            $table->string('program_genre', 64)->nullable()->after('program_title');
            $table->string('program_cast', 128)->nullable()->after('program_genre');
            $table->string('program_memo', 128)->nullable()->after('program_cast');
            $table->string('program_note_1', 128)->nullable()->after('program_memo');
            $table->string('program_note_2', 128)->nullable()->after('program_note_1');
            $table->char('has_moved', 2)->nullable()->after('program_note_2');
            $table->dateTime('actual_start_time')->nullable()->after('has_moved');
            $table->dateTime('actual_end_time')->nullable()->after('actual_start_time');
            $table->dateTime('actual_onair_start_time')->nullable()->after('actual_end_time');
            $table->dateTime('actual_onair_end_time')->nullable()->after('actual_onair_start_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commercials', function (Blueprint $table) {
            $table->dropColumn('reserve_cm');
            $table->dropColumn('program_title');
            $table->dropColumn('program_genre');
            $table->dropColumn('program_cast');
            $table->dropColumn('program_memo');
            $table->dropColumn('program_note_1');
            $table->dropColumn('program_note_2');
            $table->dropColumn('has_moved');
            $table->dropColumn('actual_start_time');
            $table->dropColumn('actual_end_time');
            $table->dropColumn('actual_onair_start_time');
            $table->dropColumn('actual_onair_end_time');
        });
    }
}
