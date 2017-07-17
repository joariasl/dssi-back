<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keys', function (Blueprint $table) {
            $table->integer('key_condition_id')->unsigned();
            $table->foreign('key_condition_id')->references('id')->on('key_conditions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keys', function (Blueprint $table) {
            $table->dropForeign('keys_key_condition_id_foreign');
            $table->dropColumn('key_condition_id');
        });
    }
}
