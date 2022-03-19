<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexBookingsAndBookedCommercials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = 'ALTER TABLE bookings ADD INDEX index_bookings_001 (`application_date`, `business_review_id`, `material_review_id`)';
        DB::connection()->getPdo()->exec($sql);

        $sql = 'ALTER TABLE booked_commercials ADD INDEX index_booked_commercials_001 (`onair_date`, `status`)';
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        $sql = 'ALTER TABLE bookings DROP INDEX index_bookings_001';
        DB::connection()->getPdo()->exec($sql);

        $sql = 'ALTER TABLE booked_commercials DROP INDEX index_booked_commercials_001';
        DB::connection()->getPdo()->exec($sql);
    }
}
