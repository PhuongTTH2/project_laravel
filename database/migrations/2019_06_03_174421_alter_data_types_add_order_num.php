<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Eloquent\DataType;

class AlterDataTypesAddOrderNum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_types', function (Blueprint $table) {
            $table->integer('order_num')->nullable()->default(0)->after('targetperiods_csv_data');
        });

        DataType::where('data_type_id', 1)->update(['order_num' => '1']);
        DataType::where('data_type_id', 2)->update(['order_num' => '2']);
        DataType::where('data_type_id', 3)->update(['order_num' => '3']);
        DataType::where('data_type_id', 4)->update(['order_num' => '4']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_types', function (Blueprint $table) {
            $table->dropColumn('order_num');
        });
    }
}
