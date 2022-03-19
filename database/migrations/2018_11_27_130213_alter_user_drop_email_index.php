<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserDropEmailIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $pdo = DB::connection()->getPdo();
            $pdo->exec('ALTER TABLE users DROP INDEX email_UNIQUE;');
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
        Schema::table('users', function (Blueprint $table) {
            $pdo = DB::connection()->getPdo();
            $pdo->exec('ALTER TABLE users ADD UNIQUE INDEX email_UNIQUE (email ASC);');
        });
    }
}
