<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Eloquent\TimeSlotPattern;

class AddPresetTimeSlot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        TimeSlotPattern::updateOrCreate([
            'time_slot_pattern_name' => '全日',
            'is_preset' => 1
        ], [
            'time_slot_pattern_name' => '全日',
            'time_slot' => ["Mon_0500", "Mon_0530", "Mon_0600", "Mon_0630", "Mon_0700", "Mon_0730", "Mon_0800", "Mon_0830", "Mon_0900", "Mon_0930", "Mon_1000", "Mon_1030", "Mon_1100", "Mon_1130", "Mon_1200", "Mon_1230", "Mon_1300", "Mon_1330", "Mon_1400", "Mon_1430", "Mon_1500", "Mon_1530", "Mon_1600", "Mon_1630", "Mon_1700", "Mon_1730", "Mon_1800", "Mon_1830", "Mon_1900", "Mon_1930", "Mon_2000", "Mon_2030", "Mon_2100", "Mon_2130", "Mon_2200", "Mon_2230", "Mon_2300", "Mon_2330", "Mon_2400", "Mon_2430", "Mon_2500", "Mon_2530", "Mon_2600", "Mon_2630", "Mon_2700", "Mon_2730", "Mon_2800", "Mon_2830", "Tue_0500", "Tue_0530", "Tue_0600", "Tue_0630", "Tue_0700", "Tue_0730", "Tue_0800", "Tue_0830", "Tue_0900", "Tue_0930", "Tue_1000", "Tue_1030", "Tue_1100", "Tue_1130", "Tue_1200", "Tue_1230", "Tue_1300", "Tue_1330", "Tue_1400", "Tue_1430", "Tue_1500", "Tue_1530", "Tue_1600", "Tue_1630", "Tue_1700", "Tue_1730", "Tue_1800", "Tue_1830", "Tue_1900", "Tue_1930", "Tue_2000", "Tue_2030", "Tue_2100", "Tue_2130", "Tue_2200", "Tue_2230", "Tue_2300", "Tue_2330", "Tue_2400", "Tue_2430", "Tue_2500", "Tue_2530", "Tue_2600", "Tue_2630", "Tue_2700", "Tue_2730", "Tue_2800", "Tue_2830", "Wed_0500", "Wed_0530", "Wed_0600", "Wed_0630", "Wed_0700", "Wed_0730", "Wed_0800", "Wed_0830", "Wed_0900", "Wed_0930", "Wed_1000", "Wed_1030", "Wed_1100", "Wed_1130", "Wed_1200", "Wed_1230", "Wed_1300", "Wed_1330", "Wed_1400", "Wed_1430", "Wed_1500", "Wed_1530", "Wed_1600", "Wed_1630", "Wed_1700", "Wed_1730", "Wed_1800", "Wed_1830", "Wed_1900", "Wed_1930", "Wed_2000", "Wed_2030", "Wed_2100", "Wed_2130", "Wed_2200", "Wed_2230", "Wed_2300", "Wed_2330", "Wed_2400", "Wed_2430", "Wed_2500", "Wed_2530", "Wed_2600", "Wed_2630", "Wed_2700", "Wed_2730", "Wed_2800", "Wed_2830", "Thu_0500", "Thu_0530", "Thu_0600", "Thu_0630", "Thu_0700", "Thu_0730", "Thu_0800", "Thu_0830", "Thu_0900", "Thu_0930", "Thu_1000", "Thu_1030", "Thu_1100", "Thu_1130", "Thu_1200", "Thu_1230", "Thu_1300", "Thu_1330", "Thu_1400", "Thu_1430", "Thu_1500", "Thu_1530", "Thu_1600", "Thu_1630", "Thu_1700", "Thu_1730", "Thu_1800", "Thu_1830", "Thu_1900", "Thu_1930", "Thu_2000", "Thu_2030", "Thu_2100", "Thu_2130", "Thu_2200", "Thu_2230", "Thu_2300", "Thu_2330", "Thu_2400", "Thu_2430", "Thu_2500", "Thu_2530", "Thu_2600", "Thu_2630", "Thu_2700", "Thu_2730", "Thu_2800", "Thu_2830", "Fri_0500", "Fri_0530", "Fri_0600", "Fri_0630", "Fri_0700", "Fri_0730", "Fri_0800", "Fri_0830", "Fri_0900", "Fri_0930", "Fri_1000", "Fri_1030", "Fri_1100", "Fri_1130", "Fri_1200", "Fri_1230", "Fri_1300", "Fri_1330", "Fri_1400", "Fri_1430", "Fri_1500", "Fri_1530", "Fri_1600", "Fri_1630", "Fri_1700", "Fri_1730", "Fri_1800", "Fri_1830", "Fri_1900", "Fri_1930", "Fri_2000", "Fri_2030", "Fri_2100", "Fri_2130", "Fri_2200", "Fri_2230", "Fri_2300", "Fri_2330", "Fri_2400", "Fri_2430", "Fri_2500", "Fri_2530", "Fri_2600", "Fri_2630", "Fri_2700", "Fri_2730", "Fri_2800", "Fri_2830", "Sat_0500", "Sat_0530", "Sat_0600", "Sat_0630", "Sat_0700", "Sat_0730", "Sat_0800", "Sat_0830", "Sat_0900", "Sat_0930", "Sat_1000", "Sat_1030", "Sat_1100", "Sat_1130", "Sat_1200", "Sat_1230", "Sat_1300", "Sat_1330", "Sat_1400", "Sat_1430", "Sat_1500", "Sat_1530", "Sat_1600", "Sat_1630", "Sat_1700", "Sat_1730", "Sat_1800", "Sat_1830", "Sat_1900", "Sat_1930", "Sat_2000", "Sat_2030", "Sat_2100", "Sat_2130", "Sat_2200", "Sat_2230", "Sat_2300", "Sat_2330", "Sat_2400", "Sat_2430", "Sat_2500", "Sat_2530", "Sat_2600", "Sat_2630", "Sat_2700", "Sat_2730", "Sat_2800", "Sat_2830", "Sun_0500", "Sun_0530", "Sun_0600", "Sun_0630", "Sun_0700", "Sun_0730", "Sun_0800", "Sun_0830", "Sun_0900", "Sun_0930", "Sun_1000", "Sun_1030", "Sun_1100", "Sun_1130", "Sun_1200", "Sun_1230", "Sun_1300", "Sun_1330", "Sun_1400", "Sun_1430", "Sun_1500", "Sun_1530", "Sun_1600", "Sun_1630", "Sun_1700", "Sun_1730", "Sun_1800", "Sun_1830", "Sun_1900", "Sun_1930", "Sun_2000", "Sun_2030", "Sun_2100", "Sun_2130", "Sun_2200", "Sun_2230", "Sun_2300", "Sun_2330", "Sun_2400", "Sun_2430", "Sun_2500", "Sun_2530", "Sun_2600", "Sun_2630", "Sun_2700", "Sun_2730", "Sun_2800", "Sun_2830"],
            'is_preset' => 1,
        ]);

        TimeSlotPattern::updateOrCreate([
            'time_slot_pattern_name' => 'ヨの字',
            'is_preset' => 1
        ], [
            'time_slot_pattern_name' => 'ヨの字',
            'time_slot' => ["Mon_0500", "Mon_0530", "Mon_0600", "Mon_0630", "Mon_0700", "Mon_0730", "Mon_0800", "Mon_0830", "Mon_1200", "Mon_1230", "Mon_1300", "Mon_1330", "Mon_1400", "Mon_1430", "Mon_1800", "Mon_1830", "Mon_1900", "Mon_1930", "Mon_2000", "Mon_2030", "Mon_2100", "Mon_2130", "Mon_2200", "Mon_2230", "Mon_2300", "Mon_2330", "Mon_2400", "Mon_2430", "Tue_0500", "Tue_0530", "Tue_0600", "Tue_0630", "Tue_0700", "Tue_0730", "Tue_0800", "Tue_0830", "Tue_1200", "Tue_1230", "Tue_1300", "Tue_1330", "Tue_1400", "Tue_1430", "Tue_1800", "Tue_1830", "Tue_1900", "Tue_1930", "Tue_2000", "Tue_2030", "Tue_2100", "Tue_2130", "Tue_2200", "Tue_2230", "Tue_2300", "Tue_2330", "Tue_2400", "Tue_2430", "Wed_0500", "Wed_0530", "Wed_0600", "Wed_0630", "Wed_0700", "Wed_0730", "Wed_0800", "Wed_0830", "Wed_1200", "Wed_1230", "Wed_1300", "Wed_1330", "Wed_1400", "Wed_1430", "Wed_1800", "Wed_1830", "Wed_1900", "Wed_1930", "Wed_2000", "Wed_2030", "Wed_2100", "Wed_2130", "Wed_2200", "Wed_2230", "Wed_2300", "Wed_2330", "Wed_2400", "Wed_2430", "Thu_0500", "Thu_0530", "Thu_0600", "Thu_0630", "Thu_0700", "Thu_0730", "Thu_0800", "Thu_0830", "Thu_1200", "Thu_1230", "Thu_1300", "Thu_1330", "Thu_1400", "Thu_1430", "Thu_1800", "Thu_1830", "Thu_1900", "Thu_1930", "Thu_2000", "Thu_2030", "Thu_2100", "Thu_2130", "Thu_2200", "Thu_2230", "Thu_2300", "Thu_2330", "Thu_2400", "Thu_2430", "Fri_0500", "Fri_0530", "Fri_0600", "Fri_0630", "Fri_0700", "Fri_0730", "Fri_0800", "Fri_0830", "Fri_1200", "Fri_1230", "Fri_1300", "Fri_1330", "Fri_1400", "Fri_1430", "Fri_1800", "Fri_1830", "Fri_1900", "Fri_1930", "Fri_2000", "Fri_2030", "Fri_2100", "Fri_2130", "Fri_2200", "Fri_2230", "Fri_2300", "Fri_2330", "Fri_2400", "Fri_2430", "Sat_0500", "Sat_0530", "Sat_0600", "Sat_0630", "Sat_0700", "Sat_0730", "Sat_0800", "Sat_0830", "Sat_0900", "Sat_0930", "Sat_1000", "Sat_1030", "Sat_1100", "Sat_1130", "Sat_1200", "Sat_1230", "Sat_1300", "Sat_1330", "Sat_1400", "Sat_1430", "Sat_1500", "Sat_1530", "Sat_1600", "Sat_1630", "Sat_1700", "Sat_1730", "Sat_1800", "Sat_1830", "Sat_1900", "Sat_1930", "Sat_2000", "Sat_2030", "Sat_2100", "Sat_2130", "Sat_2200", "Sat_2230", "Sat_2300", "Sat_2330", "Sat_2400", "Sat_2430", "Sun_0500", "Sun_0530", "Sun_0600", "Sun_0630", "Sun_0700", "Sun_0730", "Sun_0800", "Sun_0830", "Sun_0900", "Sun_0930", "Sun_1000", "Sun_1030", "Sun_1100", "Sun_1130", "Sun_1200", "Sun_1230", "Sun_1300", "Sun_1330", "Sun_1400", "Sun_1430", "Sun_1500", "Sun_1530", "Sun_1600", "Sun_1630", "Sun_1700", "Sun_1730", "Sun_1800", "Sun_1830", "Sun_1900", "Sun_1930", "Sun_2000", "Sun_2030", "Sun_2100", "Sun_2130", "Sun_2200", "Sun_2230", "Sun_2300", "Sun_2330", "Sun_2400", "Sun_2430"],
            'is_preset' => 1,
        ]);

        TimeSlotPattern::updateOrCreate([
            'time_slot_pattern_name' => 'コの字',
            'is_preset' => 1
        ], [
            'time_slot_pattern_name' => 'コの字',
            'time_slot' => ["Mon_0500", "Mon_0530", "Mon_0600", "Mon_0630", "Mon_0700", "Mon_0730", "Mon_0800", "Mon_0830", "Mon_1800", "Mon_1830", "Mon_1900", "Mon_1930", "Mon_2000", "Mon_2030", "Mon_2100", "Mon_2130", "Mon_2200", "Mon_2230", "Mon_2300", "Mon_2330", "Mon_2400", "Mon_2430", "Tue_0500", "Tue_0530", "Tue_0600", "Tue_0630", "Tue_0700", "Tue_0730", "Tue_0800", "Tue_0830", "Tue_1800", "Tue_1830", "Tue_1900", "Tue_1930", "Tue_2000", "Tue_2030", "Tue_2100", "Tue_2130", "Tue_2200", "Tue_2230", "Tue_2300", "Tue_2330", "Tue_2400", "Tue_2430", "Wed_0500", "Wed_0530", "Wed_0600", "Wed_0630", "Wed_0700", "Wed_0730", "Wed_0800", "Wed_0830", "Wed_1800", "Wed_1830", "Wed_1900", "Wed_1930", "Wed_2000", "Wed_2030", "Wed_2100", "Wed_2130", "Wed_2200", "Wed_2230", "Wed_2300", "Wed_2330", "Wed_2400", "Wed_2430", "Thu_0500", "Thu_0530", "Thu_0600", "Thu_0630", "Thu_0700", "Thu_0730", "Thu_0800", "Thu_0830", "Thu_1800", "Thu_1830", "Thu_1900", "Thu_1930", "Thu_2000", "Thu_2030", "Thu_2100", "Thu_2130", "Thu_2200", "Thu_2230", "Thu_2300", "Thu_2330", "Thu_2400", "Thu_2430", "Fri_0500", "Fri_0530", "Fri_0600", "Fri_0630", "Fri_0700", "Fri_0730", "Fri_0800", "Fri_0830", "Fri_1800", "Fri_1830", "Fri_1900", "Fri_1930", "Fri_2000", "Fri_2030", "Fri_2100", "Fri_2130", "Fri_2200", "Fri_2230", "Fri_2300", "Fri_2330", "Fri_2400", "Fri_2430", "Sat_0500", "Sat_0530", "Sat_0600", "Sat_0630", "Sat_0700", "Sat_0730", "Sat_0800", "Sat_0830", "Sat_0900", "Sat_0930", "Sat_1000", "Sat_1030", "Sat_1100", "Sat_1130", "Sat_1200", "Sat_1230", "Sat_1300", "Sat_1330", "Sat_1400", "Sat_1430", "Sat_1500", "Sat_1530", "Sat_1600", "Sat_1630", "Sat_1700", "Sat_1730", "Sat_1800", "Sat_1830", "Sat_1900", "Sat_1930", "Sat_2000", "Sat_2030", "Sat_2100", "Sat_2130", "Sat_2200", "Sat_2230", "Sat_2300", "Sat_2330", "Sat_2400", "Sat_2430", "Sun_0500", "Sun_0530", "Sun_0600", "Sun_0630", "Sun_0700", "Sun_0730", "Sun_0800", "Sun_0830", "Sun_0900", "Sun_0930", "Sun_1000", "Sun_1030", "Sun_1100", "Sun_1130", "Sun_1200", "Sun_1230", "Sun_1300", "Sun_1330", "Sun_1400", "Sun_1430", "Sun_1500", "Sun_1530", "Sun_1600", "Sun_1630", "Sun_1700", "Sun_1730", "Sun_1800", "Sun_1830", "Sun_1900", "Sun_1930", "Sun_2000", "Sun_2030", "Sun_2100", "Sun_2130", "Sun_2200", "Sun_2230", "Sun_2300", "Sun_2330", "Sun_2400", "Sun_2430"],
            'is_preset' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
