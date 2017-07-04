<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAmphitryonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amphitryons', function (Blueprint $table) {
            $table->integer('area_id')->unsigned()->unique();
            $table->integer('position_id')->unsigned()->unique();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('amphitryons', function (Blueprint $table) {
            $table->dropForeign('amphitryons_area_id_foreign');
            $table->dropForeign('amphitryons_position_id_foreign');
            $table->dropColumn('area_id');
            $table->dropColumn('position_id');
        });
    }
}
