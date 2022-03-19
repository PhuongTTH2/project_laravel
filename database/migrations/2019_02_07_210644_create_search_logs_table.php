<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('event_log_id');
            $table->timestamp('event_date');
            $table->bigInteger('user_id');
            $table->text('screen_name');
            $table->date('position_from')->nullable();
            $table->date('position_to')->nullable();
            $table->char('area_code', 7)->nullable();
            $table->text('callsign')->nullable();
            $table->text('pt_sb_code')->nullable();
            $table->integer('data_type_id')->nullable();
            $table->text('rate_type_id')->nullable();
            $table->integer('period_type_id')->nullable();
            $table->integer('aggregate_type_id')->nullable();
            $table->string('target_group_code', 32)->nullable();
            $table->string('target_code', 32)->nullable();
            $table->date('period_from_date')->nullable();
            $table->date('period_to_date')->nullable();
            $table->text('period_name')->nullable();
            $table->date('created_at');
            $table->bigInteger('created_by')->nullable();
            $table->date('updated_at');
            $table->bigInteger('updated_by')->nullable();
            $table->date('deleted_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_logs');
    }
}
