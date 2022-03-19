<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAuctionCommercialsAddUrlDetail extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auction_commercials', function (Blueprint $table) {
            $table->text('url_detail')->nullable()->after('is_fixed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auction_commercials', function (Blueprint $table) {
            $table->dropColumn('url_detail');
        });
    }
}
