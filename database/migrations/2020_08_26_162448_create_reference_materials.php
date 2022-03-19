<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenceMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('reference_materials')) {
            Schema::create('reference_materials', function (Blueprint $table) {
                $table->increments('id');
                $table->bigInteger('broadcast_id');
                $table->string('file', 64);
                $table->string('file_name', 64);
                $table->enum('type', \App\Enums\ReferenceMaterialType::getValues());
                $table->dateTime('publish_start')->nullable();
                $table->dateTime('publish_end')->nullable();
                $table->dateTime('created_at');
                $table->bigInteger('created_by');
                $table->dateTime('updated_at');
                $table->bigInteger('updated_by');
                $table->dateTime('deleted_at')->nullable();
                $table->bigInteger('deleted_by')->nullable();
                $table->foreign('broadcast_id')->references('id')->on('broadcasters');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('reference_materials')) {
            Schema::dropIfExists('reference_materials');
        }
    }
}
