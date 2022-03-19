<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCartCopyUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('carts', function (Blueprint $table) {
            $table->text('title')->change();
            $table->bigInteger('original_cart_id')->nullable()->after('is_booked');
            $table->dateTime('received_at')->nullable()->after('original_cart_id');
            $table->text('received_message')->nullable()->after('received_at');
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
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('original_cart_id');
            $table->dropColumn('received_at');
            $table->dropColumn('received_message');
        });
    }
}
