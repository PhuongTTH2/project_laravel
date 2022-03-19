<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTypeCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_type_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('order_num')->nullable();
            $table->dateTime('created_at');
            $table->bigInteger('created_by');
            $table->dateTime('updated_at');
            $table->bigInteger('updated_by');
            $table->dateTime('deleted_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
        });

        $now = Carbon\Carbon::now();
        \App\Models\Eloquent\CompanyTypeCode::insert([
            ['name' => '放送局', 'order_num' => 1, 'created_at' => $now, 'updated_at' => $now, 'created_by' => -1, 'updated_by' => -1],
            ['name' => '広告会社', 'order_num' => 2, 'created_at' => $now, 'updated_at' => $now, 'created_by' => -1, 'updated_by' => -1],
            ['name' => '広告主', 'order_num' => 3, 'created_at' => $now, 'updated_at' => $now, 'created_by' => -1, 'updated_by' => -1],
            ['name' => 'データ会社', 'order_num' => 4, 'created_at' => $now, 'updated_at' => $now, 'created_by' => -1, 'updated_by' => -1],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company_type_codes');
    }
}
