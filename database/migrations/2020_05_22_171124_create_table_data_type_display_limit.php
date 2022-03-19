<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Eloquent\DataTypeDisplayLimit;
use App\Models\Eloquent\FunctionLicense;

class CreateTableDataTypeDisplayLimit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $sql = "
        CREATE TABLE IF NOT EXISTS `data_type_display_limits` (
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `data_type_id` INT NOT NULL,
            `function_code` CHAR(8) NOT NULL,
            `kind` INT NOT NULL DEFAULT 0,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL,
            `deleted_at` DATETIME NULL,
            `created_by` BIGINT NULL,
            `updated_by` BIGINT NULL,
            `deleted_by` BIGINT NULL,
            PRIMARY KEY (`id`),
            INDEX `fk_data_type_display_limit_data_type1` (`data_type_id`),
            CONSTRAINT `fk_data_type_display_limit_data_type1` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`data_type_id`) ON UPDATE NO ACTION ON DELETE NO ACTION
        )ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
        ";

        DB::connection()->getPdo()->exec($sql);

        // プランニング　TVI除外
        $d1 = new DataTypeDisplayLimit();
        $d1->data_type_id = 4;
        $d1->function_code = FunctionLicense::MENU_PLANNING;
        $d1->kind = 1;
        $d1->save();

        $d2 = new DataTypeDisplayLimit();
        $d2->data_type_id = 4;
        $d2->function_code = FunctionLicense::MENU_PLANNING;
        $d2->kind = 2;
        $d2->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('data_type_display_limits');
    }
}
