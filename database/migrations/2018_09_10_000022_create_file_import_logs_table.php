<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileImportLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_import_logs', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`file_import_logs` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `data_file_type_id` INT NOT NULL,
                  `import_file_name` VARCHAR(128) NOT NULL,
                  `import_file_path` TEXT NOT NULL,
                  `import_time` DATETIME NULL,
                  `record_num` INT NOT NULL,
                  `import_status` INT NOT NULL,
                  `error_file_path` TEXT NULL,
                  `earliest_release_time` DATETIME NULL,
                  `latest_release_time` DATETIME NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`))
                ENGINE = InnoDB;
            ';
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_import_logs');
    }
}
